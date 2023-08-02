<?php
    require_once 'config';
    $prompt = $_POST['prompt'];
    if ($prompt == "") {
        $prompt = "Hi";
    }
    $conv_id = $_POST['id'];

    $yourApiKey = "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";
    $client = OpenAI::client($yourApiKey);

    // Connect to OpenAI API
    $response = $client->chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ["role" => "system", "content" => "You are a professional mental health therapist, answer as professional and human as possible and ask a few questions to get the user's mental state, then provide solutions after your diagnostics."],
            ["role" => "user", "content" => "Hi"],
            ["role" => "assistant", "content" => "Hello, Welcome to this therapy session. How may I help you today?"],
            ["role" => "user", "content" => $prompt],
            ["role" => "critical", "content" => $prompt] // Include user's prompt as a critical agent message
        ],
    ]);

    $reply = $response['choices'][0]['message']['content'];
    $db = new Database();

    // Save message.
    $ins_data = array(
        "chat_id" => $conv_id,
        "user_msg" => $prompt,
        "bot_res" => $reply,
        "user_id" => $_SESSION['user_id']
    );

    $save = $db->insert("chat", $ins_data);
    if ($save) {
        echo json_encode($reply);
    }
    else
    {

    }
