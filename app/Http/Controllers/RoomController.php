<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    /**
     * Display a listing of rooms with search and filters.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $roomTypeId = $request->query('room_type_id');
        $status = $request->query('status');
        $sort = $request->query('sort', 'newest');

        $query = Room::with('roomType')
            ->search($search)
            ->filterByType($roomTypeId)
            ->filterByStatus($status);

        // Sorting
        switch ($sort) {
            case 'oldest':
                $query->oldest('id');
                break;
            case 'price_asc':
                $query->orderBy('price_per_night', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_per_night', 'desc');
                break;
            case 'room_asc':
                $query->orderBy('room_number', 'asc');
                break;
            case 'newest':
            default:
                $query->latest('id');
                break;
        }

        $rooms = $query->paginate(6)->withQueryString();

        // Summary statistics (Slide 7 cards)
        $totalRooms = Room::count();
        $totalRoomTypes = RoomType::count();
        $availableRooms = Room::where('status', 'Available')->count();
        $avgPrice = Room::avg('price_per_night') ?? 0;

        $roomTypes = RoomType::orderBy('name')->get();

        return view('rooms.index', compact(
            'rooms',
            'roomTypes',
            'totalRooms',
            'totalRoomTypes',
            'availableRooms',
            'avgPrice',
            'search',
            'roomTypeId',
            'status',
            'sort'
        ));
    }

    /**
     * Show the form for creating a new room.
     */
    public function create()
    {
        $roomTypes = RoomType::orderBy('name')->get();

        return view('rooms.create', compact('roomTypes'));
    }

    /**
     * Store a newly created room in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:50', 'unique:rooms,room_number'],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'floor' => ['required', 'string', 'max:50'],
            'status' => ['required', Rule::in(['Available', 'Occupied', 'Maintenance'])],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $room = Room::create($validated);

        return redirect()->route('rooms.index')->with('success', "Room {$room->room_number} registered successfully!");
    }

    /**
     * Display the specified room.
     */
    public function show(Room $room)
    {
        $room->load('roomType');

        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified room.
     */
    public function edit(Room $room)
    {
        $roomTypes = RoomType::orderBy('name')->get();

        return view('rooms.edit', compact('room', 'roomTypes'));
    }

    /**
     * Update the specified room in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'room_number' => ['required', 'string', 'max:50', Rule::unique('rooms', 'room_number')->ignore($room->id)],
            'room_type_id' => ['required', 'exists:room_types,id'],
            'price_per_night' => ['required', 'numeric', 'min:0'],
            'floor' => ['required', 'string', 'max:50'],
            'status' => ['required', Rule::in(['Available', 'Occupied', 'Maintenance'])],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $room->update($validated);

        return redirect()->route('rooms.index')->with('success', "Room {$room->room_number} updated successfully!");
    }

    /**
     * Remove the specified room from storage.
     */
    public function destroy(Room $room)
    {
        $roomNumber = $room->room_number;
        $room->delete();

        return redirect()->route('rooms.index')->with('success', "បានលុបបន្ទប់ {$roomNumber} ដោយជោគជ័យ (Room {$roomNumber} deleted successfully)!");
    }
}
