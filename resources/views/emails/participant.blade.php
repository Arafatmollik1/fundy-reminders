<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #5A67D8;
            text-align: center;
        }
        .event-card {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        .event-card div {
            margin-bottom: 10px;
        }
        .event-card label {
            font-weight: bold;
            color: #4a5568;
            display: block;
        }
        .event-card span {
            display: block;
            color: #333;
            margin-top: 5px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>

<div class="email-container">
    <h2>Reminder: {{ $eventData['name'] }}</h2>

    <p>Dear {{ $participantData['name'] }},</p>
    <p>This is a reminder for the upcoming event, <strong>{{ $eventData['name'] }}</strong>. Below are the details:</p>

    <div class="event-card">
        <div>
            <label>Message</label>
            <span>{{ $participantData['message'] }}</span>
        </div>
        <div>
            <label>Amount</label>
            <span>{{ $participantData['amount'] }}</span>
        </div>
        <div>
            <label>Bank ID</label>
            <span>{{ $participantData['bank_id'] }}</span>
        </div>
        <div>
            <label>Name of the recipient</label>
            <span>{{ $participantData['recipient_name'] }}</span>
        </div>
        <div>
            <label>Mobile Pay Number</label>
            <span>{{ $participantData['mobile_pay_number'] }}</span>
        </div>
    </div>

    <p>If you have any questions or need assistance, feel free to contact Arafat Mollik. </p>

{{--
    <a href="{{ route('events.paid.info', [$eventData['id'] , $participantData['id']]) }}" style="display: block; text-align: center; margin-top: 20px; padding: 10px 20px; background-color: #5A67D8; color: #ffffff; text-decoration: none; border-radius: 5px;">I have paid</a>

    --}}
    <div class="footer">
        <p>Thank you for your participation!</p>
        <p>&copy; {{ date('Y') }}</p>
    </div>
</div>

</body>
</html>
