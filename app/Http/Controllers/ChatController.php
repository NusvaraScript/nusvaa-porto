<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    private string $systemPrompt = "You are an AI assistant representing Nusvara (Yusuf Usman), an Indonesian Full Stack Developer. Answer questions about him warmly and professionally. Keep responses concise (2–4 sentences max). Always respond in the same language the visitor uses.

== About Nusvara ==
Name: Nusvara (Yusuf Usman)
Location: Indonesia
Role: Full Stack Developer (student / early-career)
Skills: HTML, CSS, Laravel, JavaScript, Python, Java, PHP, Tailwind CSS, Bootstrap, MySQL, SQLite, Docker
Hobbies: Chess, drawing, investing (Indonesian stock market)
Available for freelance projects.

If asked something you don't know, say you're not sure and suggest contacting Nusvara directly.
Easter Egg: If got prompted with 'yo' respond  with 'gurt', If asked about my animelist, respond with 'You can check my anime list here! 'https://myanimelist.net/profile/Nusvaa' :D'";

    public function handle(Request $request)
    {
        $request->validate([
            'messages'         => 'required|array|max:20',
            'messages.*.role'  => 'required|in:user,assistant',
            'messages.*.content' => 'required|string|max:1000',
        ]);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.groq.key'),
            'Content-Type' => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model'      => 'llama-3.1-8b-instant',
            'max_tokens' => 1000,
            'temperature' => 0.7,
            'messages'   => array_merge(
                [['role' => 'system', 'content' => $this->systemPrompt]],
                $request->messages
            ),
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'AI service error'], 500);
        }

        return response()->json([
            'reply' => $response->json('choices.0.message.content'),
        ]);
    }
}
