<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Table;

class ReservationController extends Controller
{
    public function index()
    {
        return view(
            'reservations',
            [
                'reservations' => Reservation::all()->sortByDesc('date')
            ]
        );
    }
    public function reserve()
    {
        return view(
            'reservation',
            [
                'tables' => Table::where('status', 'available')->get()
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);

        $attributes = $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:11', 'max:11'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
            'guests_number' => ['required', 'integer', 'min:1'],
            'message' => ['required', 'string', 'min:3', 'max:600'],
            'table_id' => ['required', 'integer', 'exists:tables,id']
        ]);
        Reservation::create($attributes);
        // change table status to reserved
        $table = Table::find($request->table_id);
        $table->status = 'reserved';
        $table->save();

        return redirect()->route('home')->with('success', 'Reservation request sent successfully! We will contact you shortly.');
    }

    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = 'ended';
        $reservation->save();

        // change table status to available
        $table = Table::find($reservation->table_id);
        $table->status = 'available';
        $table->save();

        return redirect()->route('reservations');
    }
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();

        return redirect()->route('reservations');
    }
}
