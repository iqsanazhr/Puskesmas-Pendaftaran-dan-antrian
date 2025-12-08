<?php

namespace App\Http\Controllers;

use App\Models\Queue;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class QueueTicketController extends Controller
{
    public function downloadPdf($id)
    {
        // Find the queue item
        $queue = Queue::with(['patient', 'poly', 'doctor.user'])->findOrFail($id);

        // Security Check: Optional, ensure user owns this queue if necessary
        // if (auth()->check() && $queue->patient->user_id !== auth()->id() && auth()->user()->role !== 'admin') {
        //    abort(403);
        // }
        // For public kiosk mode or simple flow, we might skip strict ownership for now or rely on the fact the ID is provided.

        // Prepare data for PDF
        $data = [
            'queue' => $queue,
            'title' => 'Tiket Antrian Puskesmas Ajibarang',
            'date' => Carbon::now()->translatedFormat('l, d F Y'),
            'time' => Carbon::now()->format('H:i')
        ];

        // Load View and Generate PDF
        $pdf = Pdf::loadView('pdf.queue-ticket', $data);

        // Set paper size (Thermal Printer Size example: 80mm width, dynamic height or fixed A6/A5)
        // Let's use A6 for a ticket-like size or custom array(0, 0, 226.77, 400) ~ 80mm width
        $pdf->setPaper('a6', 'portrait');

        // Download or Stream
        return $pdf->stream('Tiket-Antrian-' . $queue->number . '.pdf');
    }
}
