<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'message' => 'Contact message sent successfully',
            'contact_message' => $contactMessage
        ], 201);
    }

    public function index(): JsonResponse
    {
        $contactMessages = ContactMessage::latest()->get();

        return response()->json([
            'contact_messages' => $contactMessages
        ]);
    }

    public function show(ContactMessage $contactMessage): JsonResponse
    {
        return response()->json([
            'contact_message' => $contactMessage
        ]);
    }

    public function markAsRead(ContactMessage $contactMessage): JsonResponse
    {
        $contactMessage->update(['is_read' => true]);

        return response()->json([
            'message' => 'Message marked as read',
            'contact_message' => $contactMessage
        ]);
    }
}
