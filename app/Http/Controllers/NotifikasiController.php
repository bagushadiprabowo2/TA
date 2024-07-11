<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelNotifikasi;
use Validator;


class NotifikasiController extends Controller
{
     public function getCountByDestinationId($id, $senderType)
	{
        $notificationCounts = DB::table('notifikasi')
        ->select('destination_id', DB::raw('COALESCE(count(*), 0) as total'))
        ->where('destination_id', $id)
        ->where('sender_type', $senderType)
        ->where('status', 'unread')
        ->groupBy('destination_id')
        ->first();
        return $notificationCounts;
	}

    public function getByDestinationId($id, $senderType)
	{
        $notifications = DB::table('notifikasi')
        ->where('destination_id', $id)
        ->where('sender_type', $senderType)
        ->where('status', 'unread')
        ->get();
        return $notifications;
	}

    public function resetNotification($id)
    {
        DB::table('notifikasi')
            ->where('destination_id',$id)
            ->update(['status'=>'read']);

        return response()->json(['message' => 'Notification status updated successfully'], 200);
    }
}

