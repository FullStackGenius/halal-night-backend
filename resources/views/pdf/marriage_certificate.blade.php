<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Certificate of Mut'ah Marriage</title>

    <style>
        html,
        body {
            height: 100%;
            overflow: hidden !important;
        }

        .certificate-container {
            page-break-inside: avoid !important;
            page-break-before: avoid !important;
            page-break-after: avoid !important;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: #f7f0e6;
            /* font-family: "Times New Roman", serif; */
            margin: 0;
            padding: 40px;
            color: #5a4a3b;
        }

        .certificate-container {
            max-width: 900px;
            margin: auto;
            background: #fdf7ef;
            border: 8px double #d8c7a3;
            padding: 40px 50px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15);
        }

        h3 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 4px;
        }

        h4 {
            text-align: center;
            font-size: 12px;
            margin-top: 0;
            margin-bottom: 25px;
            letter-spacing: 1px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin: 0;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 35px;
            letter-spacing: 1px;
        }

        .names-line {
            display: flex;
            justify-content: center;
            margin: 25px 0;
            font-size: 20px;
        }

        .names-line span {
            border-bottom: 1px solid #000;
            padding: 0 40px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
            margin: 10px 0;
        }

        .recital-title {
            margin-top: 40px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }

        .arabic {
            font-size: 20px;
            text-align: center;
            margin-top: 15px;
        }

        .translation {
            text-align: center;
            margin-top: 5px;
            font-style: italic;
            font-size: 14px;
        }

        .section-row {
            margin: 40px 0;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
        }

        .section-row div {
            width: 48%;
        }

        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            padding: 0 5px;
        }

        .footer-row {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            font-size: 16px;
        }

        .footer-row div {
            width: 48%;
            text-align: center;
        }

        .signature-line {
            margin-top: 40px;
            border-top: 1px solid #000;
            width: 100%;
            text-align: center;
            padding-top: 5px;
            font-size: 16px;
        }

        .witnesses {
            margin-top: 30px;
            font-size: 16px;
        }
    </style>

</head>

<body>

    <div class="certificate-container">

        <h3>بِسْمِ اللَّهِ الرَّحْمٰنِ الرَّحِيمِ</h3>
        <h4>IN THE NAME OF ALLAH, THE BENEFICENT, THE MERCIFUL</h4>

        <h1>CERTIFICATE OF MUT'AH MARRIAGE</h1>
        <div class="subtitle">TEMPORARY MARRIAGE AGREEMENT</div>

        <p>This certifies that</p>

        <div class="names-line">
            <span>{{ $contract->husbandName }}</span> &nbsp; and &nbsp; <span>{{ $contract->wifeName }}</span>
        </div>

        <p>
            have entered into a Mut'ah (temporary) marriage with mutually agreed terms, including the specified Mehr and
            duration,
            in accordance with Islamic principles and with full mutual consent.
        </p>

        <div class="recital-title">RECITAL OF THE CONTRACT</div>

        <div class="arabic">زوَّجتُكَ نَفْسي في المُدّةِ المَعلُومةِ على المَهرِ المَعلُوم.</div>
        <div class="translation">Zawwajtuka nafsi fi al-muddatil al-ma'lūmah ʿala al-mahr al-ma'lūm.</div>
        <p class="translation">
            “I marry myself to you for the agreed duration and the agreed dowry.”<br />
            Response: <strong>Qabiltu</strong> – “I accept.”
        </p>

        <div class="section-row">
            <div>
                Agreed Mehr / Dowry: <span class="underline">{{ $contract->mahr ?? 'N/A' }}</span>
            </div>
            <div>
                Agreed Duration of Marriage: <span class="underline">{{ $contract->duration ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="section-row">
            <div>
                Date: <span class="underline">{{ $contract->startDate ?? 'N/A' }}</span>
            </div>
            <div>
                Location: <span class="underline">{{ $contract->location ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="footer-row">
            <div>
                <img src="{{ $contract->signature_husband_base64 }}" width="200px" height="100px">

                <div class="signature-line">Signature of Male</div>

            </div>
            <div>
                <img src="{{ $contract->signature_wife_base64 }}" width="200px" height="100px">

                <div class="signature-line">Signature of Female</div>

            </div>
        </div>


        <div class="witnesses">
            Witness 1 (Optional): {{ $contract->witness1Name ?? 'N/A' }}<br />
            Witness 2 (Optional): {{ $contract->witness2Name ?? 'N/A' }}<br />
        </div>

        <p style="font-size:12px; margin-top:20px; text-align:center;">
            Note: The placeholders {{ $contract->husbandName }}, {{ $contract->wifeName }},
            {{ $contract->mahr ?? 'N/A' }}, {{ $contract->duration ?? 'N/A' }}, {{ $contract->startDate ?? 'N/A' }},
            and {{ $contract->location ?? 'N/A' }}
            can be dynamically populated by your website after the form is submitted to generate a final printable
            certificate.
        </p>

    </div>

</body>

</html>
