````php
<?php
// Sample data for Visits table
$visits = [
    ['visit_id' => 1, 'customer_id' => 23],
    ['visit_id' => 2, 'customer_id' => 9],
    ['visit_id' => 4, 'customer_id' => 30],
    ['visit_id' => 5, 'customer_id' => 54],
    ['visit_id' => 6, 'customer_id' => 96],
    ['visit_id' => 7, 'customer_id' => 54],
    ['visit_id' => 8, 'customer_id' => 54],
];

// Sample data for Transactions table
$transactions = [
    ['transaction_id' => 2, 'visit_id' => 5, 'amount' => 310],
    ['transaction_id' => 3, 'visit_id' => 5, 'amount' => 300],
    ['transaction_id' => 9, 'visit_id' => 5, 'amount' => 200],
    ['transaction_id' => 12, 'visit_id' => 1, 'amount' => 910],
    ['transaction_id' => 13, 'visit_id' => 2, 'amount' => 970],
];

// Perform the LEFT JOIN manually
$leftJoinResult = [];

foreach ($visits as $visit) {
    $matched = false; // Flag to check if a match was found
    foreach ($transactions as $transaction) {
        if ($visit['visit_id'] === $transaction['visit_id']) {
            // Match found, add combined row to the result
            $leftJoinResult[] = [
                'visit_id' => $visit['visit_id'],
                'customer_id' => $visit['customer_id'],
                'transaction_id' => $transaction['transaction_id'],
                'amount' => $transaction['amount'],
            ];
            $matched = true;
        }
    }
    // If no match was found, add the visit row with NULL values for the transaction columns
    if (!$matched) {
        $leftJoinResult[] = [
            'visit_id' => $visit['visit_id'],
            'customer_id' => $visit['customer_id'],
            'transaction_id' => null,
            'amount' => null,
        ];
    }
}

// Display the LEFT JOIN result
echo "Left Join Result:\n";
foreach ($leftJoinResult as $row) {
    echo "Visit ID: {$row['visit_id']}, Customer ID: {$row['customer_id']}, ";
    echo "Transaction ID: " . ($row['transaction_id'] !== null ? $row['transaction_id'] : 'NULL') . ", ";
    echo "Amount: " . ($row['amount'] !== null ? $row['amount'] : 'NULL') . "\n";
}
