<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Money Tracker</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f4f4f4;
}

h1 {
    color: #333;
}

div {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    margin-bottom: 20px;
}

input {
    margin-right: 10px;
}

button {
    padding: 5px 10px;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    padding: 10px;
    background: #f9f9f9;
    margin-bottom: 10px;
    border-left: 5px solid #333;
}
    </style>
</head>
<body>
    <h1>Money Tracker</h1><br>
    <div>
    <h2>My Balance: <span>{{$currentBalance ?? 0}} DH</span></h2>
        <h3>Add Transaction</h3>
        <form method="POST" action="{{route('transactions.store')}}">
            @csrf
            <input type="text" name="description" placeholder="Description" required>
            <input type="number" name="amount" placeholder="Amount" required>
            <button type="submit">Add</button>
        </form>
        <h3>Transactions</h3>
        <ul>
            @foreach($transactions as $transaction)
                <li>
                    <strong>{{ $transaction->description }}</strong>   {{ $transaction->amount }}  DH   AT :  {{ $transaction->date }}
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>