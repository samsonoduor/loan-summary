<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>README - Loan Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background: #f9f9f9;
            color: #333;
        }
        h1, h2 {
            color: #2c3e50;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        h2 {
            font-size: 1.5rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        ul {
            margin: 10px 0;
            padding-left: 20px;
        }
        li {
            margin-bottom: 5px;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border-left: 5px solid #ddd;
            overflow-x: auto;
        }
        code {
            font-family: Consolas, "Courier New", monospace;
            background: #f4f4f4;
            padding: 2px 4px;
            border-radius: 3px;
        }
        a {
            color: #2980b9;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Loan Calculator</h1>
    <p>A responsive and user-friendly <strong>Loan Calculator</strong> that allows users to calculate monthly loan repayments, interest incurred, and generate a repayment schedule. Designed for ease of use, it supports a clear separation of input and results pages, enabling users to easily input loan details and view comprehensive repayment breakdowns.</p>

    <h2>Features</h2>
    <ul>
        <li><strong>Input Page:</strong> Users can enter loan details such as:
            <ul>
                <li>Name of the loanee</li>
                <li>Loan amount (KES)</li>
                <li>Monthly interest rate (%)</li>
                <li>Loan term (in months)</li>
            </ul>
        </li>
        <li><strong>Results Page:</strong> Displays:
            <ul>
                <li>Detailed repayment schedule with interest, principal, and remaining balance for each month</li>
                <li>Summary of the loan, including total interest incurred and total repayment amount</li>
                <li>Instructions for sharing results via WhatsApp or email</li>
            </ul>
        </li>
        <li><strong>Responsive Design:</strong> Optimized for various screen sizes and devices</li>
        <li><strong>Customizable:</strong> Easily adjust the styling for input and results pages independently</li>
    </ul>

    <h2>Technologies Used</h2>
    <ul>
        <li><strong>HTML5:</strong> Structure and layout</li>
        <li><strong>CSS3:</strong> Styling and design</li>
        <li><strong>JavaScript:</strong> Loan calculation logic and dynamic page transitions</li>
        <li><strong>html2canvas:</strong> For generating screenshots of the results page</li>
    </ul>

    <h2>How to Use</h2>
    <ol>
        <li><strong>Clone the Repository:</strong>
            <pre><code>git clone https://github.com/your-username/loan-calculator.git</code></pre>
        </li>
        <li>Open the <code>index.html</code> file in any web browser.</li>
        <li>Input loan details on the input page.</li>
        <li>Click the "Calculate" button to view the repayment schedule and summary.</li>
        <li>Take a screenshot of the results page for record-keeping.</li>
    </ol>

    <h2>Customization</h2>
    <p>The loan calculator's design is split into two main sections:</p>
    <ul>
        <li><strong>Input Page (<code>.input-container</code>):</strong> Customize styles for the input form.</li>
        <li><strong>Results Page (<code>.results-container</code>):</strong> Adjust the styling and layout for the results display.</li>
    </ul>
    <p>Both sections are easily adjustable via the CSS file within the <code>&lt;style&gt;</code> tag in the <code>index.html</code> file.</p>

    <h2>Future Improvements</h2>
    <ul>
        <li>Add support for saving results as a PDF</li>
        <li>Include additional loan calculation options, such as annual interest rates or grace periods</li>
        <li>Enhance accessibility with improved ARIA support</li>
    </ul>

    <h2>Contributions</h2>
    <p>Contributions are welcome! If you have any ideas for improvement or encounter any issues, feel free to open an issue or submit a pull request.</p>

    <h2>License</h2>
    <p>This project is licensed under the <strong>MIT License</strong>. See the <code>LICENSE</code> file for more details.</p>
</body>
</html>
