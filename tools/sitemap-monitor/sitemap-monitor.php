<?php
// --- CONFIG: ADJUST THESE VALUES ---
$sitemap_url = "https://example.com/sitemap_index.xml";
$mail_to     = "admin@example.com";
$mail_from   = "sitemap-monitor@example.com";
// ----------------------------------

$http_code = 0;
$error_msg = "";

if (function_exists('curl_init')) {
    $ch = curl_init($sitemap_url);
    curl_setopt_array($ch, [
        CURLOPT_NOBODY         => true,     // headers only
        CURLOPT_FOLLOWLOCATION => true,     // follow 301/302
        CURLOPT_MAXREDIRS      => 5,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => true,
        // If you have CA issues, uncomment the next 2 lines (NOT recommended in production):
        // CURLOPT_SSL_VERIFYPEER => false,
        // CURLOPT_SSL_VERIFYHOST => 0,
    ]);
    curl_exec($ch);
    $http_code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error_msg = curl_errno($ch) ? curl_error($ch) : "";
    curl_close($ch);
} else {
    // Fallback without cURL: perform a lightweight GET and parse status code
    $ctx = stream_context_create([
        'http' => ['method' => 'GET', 'timeout' => 10, 'ignore_errors' => true]
    ]);
    $data = @file_get_contents($sitemap_url, false, $ctx);
    if (isset($http_response_header[0]) &&
        preg_match('~HTTP/\S+\s+(\d{3})~', $http_response_header[0], $m)) {
        $http_code = (int) $m[1];
    } else {
        $http_code = 0;
        $error_msg = "no_response";
    }
}

if ($http_code !== 200) {
    $subject = "ALERT: sitemap returned HTTP $http_code";
    $body    = "URL $sitemap_url returned HTTP $http_code"
             . ($error_msg ? " ($error_msg)" : "")
             . " at " . date('Y-m-d H:i:s');
    $headers = "From: $mail_from\r\n";
    @mail($mail_to, $subject, $body, $headers);

    // Mark error for logs if executed via CLI or URL
    http_response_code(500);
    exit(1);
}

// Optional: silent OK
exit(0);