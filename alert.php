<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Notification System</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background-color: #121212;
            color: #eee;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #1e1e1e;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            opacity: 0.2;
            z-index: -1;
            transform: rotate(45deg);
        }
        h1, h2 {
            text-align: center;
            color: #ffbb33;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ff8800;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
        }
        .submit-btn, .notify-btn {
            background-color: #ffbb33;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .submit-btn:hover, .notify-btn:hover {
            background-color: #ff8800;
            transform: translateY(-2px);
        }
        .submit-btn:active, .notify-btn:active {
            background-color: #cc7700;
            transform: translateY(0);
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #ffbb33;
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Library Notification System</h1>
        <div class="signup-form">
            <h2>Sign Up</h2>
            <form id="signupForm">
                <div class="form-group">
                    <label for="userName">Name:</label>
                    <input type="text" id="userName" name="userName" required>
                </div>
                <div class="form-group">
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" name="userEmail" required>
                </div>
                <button type="submit" class="submit-btn">Sign Up</button>
            </form>
        </div>
        <div class="book-form">
            <h2>Add New Book</h2>
            <form id="bookForm">
                <div class="form-group">
                    <label for="bookTitle">Book Title:</label>
                    <input type="text" id="bookTitle" name="bookTitle" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Add Book</button>
                <button type="button" class="notify-btn" onclick="notifyMembers()">Notify All Members</button>
            </form>
        </div>
    </div>
    <script>
        const members = [];

        document.getElementById('signupForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const name = document.getElementById('userName').value;
            const email = document.getElementById('userEmail').value;
            members.push({ name, email });
            alert(`Thank you for signing up, ${name}!`);
            document.getElementById('signupForm').reset();
        });

        function notifyMembers() {
            if (members.length === 0) {
                alert('No members to notify.');
                return;
            }

            const bookTitle = document.getElementById('bookTitle').value;
            const category = document.getElementById('category').value;
            const price = document.getElementById('price').value;
            const description = document.getElementById('description').value;

            let emailList = members.map(member => member.email).join(', ');
            alert(`Email notifications will be sent to: ${emailList}`);
            alert(`New book added:\nTitle: ${bookTitle}\nCategory: ${category}\nPrice: ${price}\nDescription: ${description}`);

            // Here you would integrate with an email service to send the actual emails
        }

        document.getElementById('bookForm').addEventListener('submit', function(event) {
            event.preventDefault();
            notifyMembers();
        });
    </script>
</body>
</html>
