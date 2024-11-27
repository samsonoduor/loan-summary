<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Calculator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            background: #F5F5F5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container-input {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 396px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .container-results {
            background: #ffffff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        h1 {
            text-align: left;
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
        }
        #head-description {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 24px;
        }
        #logo {
            display: block;
            margin: 0 auto 20px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            background-color: #ddd;
            object-fit: cover;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        label {
            flex: 0 0 40%;
            font-size: 1rem;
            color: #333;
            text-align: left;
            margin-right: 15px;
        }
        input[type="text"], input[type="number"], select {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            color: #333;
            background-color: white;
            transition: all 0.3s ease-in-out;
        }
        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none;
            border-color: #0369B1;
            box-shadow: none;
        }
        ::placeholder {
            font-size: 12px;
            font-weight: 100;
        }
        select {
            appearance: none;
            background-color: #fff;
        }
        button {
            background: #000000;
            color: #ffffff;
            border: none;
            padding: 15px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 20px;
            width: 100%; /* Same width as input fields */
        }
        button:hover {
            background: #ffffff;
            color: #000000;
            border: 1px solid #000000;
            border-radius: 8px;
        }
        #summary {
            background: #e6f7e6;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: block;
        }
        #summary h2 {
            text-align: left;
            color: #E22E56;
        }
        #summary p {
            font-size: 1rem;
            color: #333;
            margin-bottom: 10px;
            font-weight: bold;
        }
        #summary p span {
            font-weight: normal;
            color: #555;
        }
        #summary p#totalAmountDue {
            background-color: #FFF3CD;
            padding: 8px;
            border-radius: 5px;
            font-weight: bold;
            color: #856404;
        }
        #repaymentSchedule {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            display: block;
        }
        #repaymentSchedule th, #repaymentSchedule td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        #repaymentSchedule th {
            background-color: #E22E56;
            color: white;
        }
        #instructions {
            margin-top: 20px;
            font-size: 1rem;
            color: #333;
            background-color: #f0f8ff;
            padding: 15px;
            border-radius: 8px;
            display: none;
        }
        #backBtn {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-input" id="inputPage">
        <img src="./images/logo.jpg" alt="Logo" id="logo">
        <h2 id="head-description">Loan Calculator</h2>
        <form id="loanForm" method="POST">
            <div class="form-group">
                <label for="loaneeName">Name of Loanee:</label>
                <input type="text" id="loaneeName" name="loaneeName" placeholder="Type your full name" required>
            </div>
            <div class="form-group">
                <label for="loanAmount">Loan Amount (KES):</label>
                <input type="number" id="loanAmount" name="loanAmount" min="1" step="0.01" placeholder="How much do you need?" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Interest Rate (%):</label>
                <input type="number" id="interestRate" name="interestRate" min="0.01" step="0.01" placeholder="Monthly interest rate"required>
            </div>
            <div class="form-group">
                <label for="months">Number of Months:</label>
                <select id="months" name="months" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <button type="submit" id="calculateBtn">View Summary</button>
        </form>
    </div>

    <div class="container-results" id="resultsPage" style="display:none;">
        <h1>Repayment Schedule in KES</h1>

        <!-- Loan Repayment Schedule Table -->
        <table id="repaymentSchedule">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Beginning Balance</th>
                    <th>Monthly Installment</th>
                    <th>Interest Paid</th>
                    <th>Ending Balance</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <!-- Loan Summary Section -->
        <div id="summary">
            <h2>Loan Summary</h2>
            <p><strong>Loanee Name:</strong> <span id="summaryName"></span></p>
            <p><strong>Principal Loan Amount:</strong> KES <span id="summaryAmount"></span></p>
            <p><strong>Monthly Interest Rate:</strong> <span id="summaryInterestRate"></span>%</p>
            <p><strong>Total Interest Incurred:</strong> KES <span id="summaryInterest"></span></p>
            <p id="totalAmountDue"><strong>Total Amount Due:</strong> KES <span id="summaryTotalAmount"></span></p>
        </div>

        <!-- Instructions Section -->
        <div id="instructions">
            <h3>Instructions</h3>
            <p>Please take a screenshot of this page and share with me via WhatsApp or email.</p>
        </div>

        <button id="backBtn" onclick="goBack()">Back</button>
    </div>

    <script>
        // Handle form submission
        document.getElementById("loanForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            calculateLoan();
        });

        function calculateLoan() {
            const name = document.getElementById("loaneeName").value;
            const loanAmount = parseFloat(document.getElementById("loanAmount").value);
            const interestRate = parseFloat(document.getElementById("interestRate").value) / 100;
            const months = parseInt(document.getElementById("months").value);

            const monthlyRate = interestRate;
            const monthlyPayment = (loanAmount * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -months));
            let remainingBalance = loanAmount;
            let totalInterest = 0;

            const repaymentSchedule = document.getElementById("repaymentSchedule").getElementsByTagName('tbody')[0];
            repaymentSchedule.innerHTML = ""; // Clear previous table rows

            // Generate repayment schedule
            for (let i = 1; i <= months; i++) {
                const interestPaid = remainingBalance * monthlyRate;
                const endingBalance = remainingBalance + interestPaid - monthlyPayment;

                repaymentSchedule.innerHTML += `
                    <tr>
                        <td>${i}</td>
                        <td>${remainingBalance.toLocaleString()}</td>
                        <td>${monthlyPayment.toLocaleString()}</td>
                        <td>${interestPaid.toLocaleString()}</td>
                        <td>${endingBalance.toLocaleString()}</td>
                    </tr>
                `;
                remainingBalance = endingBalance;
                totalInterest += interestPaid;
            }

            // Fill Summary
            document.getElementById("summaryName").textContent = name;
            document.getElementById("summaryAmount").textContent = loanAmount.toLocaleString();
            document.getElementById("summaryInterestRate").textContent = (interestRate * 100).toFixed(2);
            document.getElementById("summaryInterest").textContent = totalInterest.toLocaleString();
            document.getElementById("summaryTotalAmount").textContent = (loanAmount + totalInterest).toLocaleString();

            // Show results page
            document.getElementById("inputPage").style.display = "none";
            document.getElementById("resultsPage").style.display = "block";
            document.getElementById("backBtn").style.display = "inline-block";
            document.getElementById("instructions").style.display = "block";
        }

        function goBack() {
            document.getElementById("inputPage").style.display = "block";
            document.getElementById("resultsPage").style.display = "none";
        }
    </script>
</body>
</html>
