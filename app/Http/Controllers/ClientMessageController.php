<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ClientMessage;
use App\Models\SummernoteContent;

class ClientMessageController extends Controller
{
    public function index()
    {
        $clientMessages = ClientMessage::paginate(10);
        $summernoteContent = new SummernoteContent();
        return view('backend.client_messages.index', ['clientMessages' => $clientMessages, 'summernoteContent' => $summernoteContent, 'page_title' => 'Client Messages']);
    }

    public function create()
    {
        return view('backend.client_messages.create', ['page_title' => 'Create Client Message']);
    }

    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|string',
        'name_ne' => 'nullable|string',
        'message' => 'required|string',
        'message_ne' => 'nullable|string',
    ]);

    try {
        // Process Summernote message using the SummernoteContent model
        $summernoteContent = new SummernoteContent();
        $processedMessage = $summernoteContent->processContent($request->input('message'));
        $processedMessageNe = $summernoteContent->processContent($request->input('message_ne'));

        $clientmessage = new ClientMessage();
        $clientmessage->name = $request->input('name');
        $clientmessage->name_ne = $request->input('name_ne');
        $clientmessage->message = $processedMessage;
        $clientmessage->message_ne = $processedMessageNe;
        $clientmessage->save();

        return redirect()->route('admin.client_messages.index')->with('success', 'Client message created successfully.');
    } catch (Exception $e) {
        return back()->with('error', 'Error creating client message: ' . $e->getMessage());
    }
}

    public function edit($id)
    {
        $message = ClientMessage::findOrFail($id);
        return view('backend.client_messages.update', compact('message'))->with('page_title', 'Edit Client Message');
    }

    public function update(Request $request, $id)
{
    $this->validate($request, [
        'name' => 'required|string',
        'name_ne' => 'nullable|string',
        'message' => 'required|string',
        'message_ne' => 'nullable|string',
    ]);

    try {
        $message = ClientMessage::findOrFail($id);

        // Process Summernote message using the SummernoteContent model
        $summernoteContent = new SummernoteContent();
        $processedMessage = $summernoteContent->processContent($request->input('message'));
        $processedMessageNe = $summernoteContent->processContent($request->input('message_ne'));

        $message->name = $request->input('name');
        $message->name_ne = $request->input('name_ne');
        $message->message = $processedMessage;
        $message->message_ne = $processedMessageNe;
        $message->save();

        return redirect()->route('admin.client_messages.index')->with('success', 'Client message updated successfully.');
    } catch (Exception $e) {
        return back()->with('error', 'Error updating client message: ' . $e->getMessage());
    }
}
    public function destroy($id)
    {
        $message = ClientMessage::findOrFail($id);

        $message->delete();
        return redirect()->route('admin.client_messages.index')->with('success', 'Client message deleted successfully.');
    }

    public function showClientMessage()
    {
        $clientMessages = ClientMessage::all(); // Fetch all client messages
        return view('frontend.index', ['clientMessages' => $clientMessages]);
    }
}

