use Google_Client;

function getGoogleClient() {
    $client = new Google_Client();
    $client->setAuthConfig(storage_path('credentials.json'));
    $client->setScopes(['https://www.googleapis.com/auth/chat.bot']);
    return $client;
}
