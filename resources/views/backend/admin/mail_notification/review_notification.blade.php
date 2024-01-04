<!-- resources/views/emails/review_notification.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Review Submitted!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
/* Style the container */
#q27 {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style the question text */
#q27 .question {
    font-weight: 400;
    margin-bottom: 10px;
}

/* Style the table */
.matrix_stars {
    width: 100%;
    border-collapse: collapse;
}

/* Style table rows */
.matrix_row_light{
    background-color: #FFEECC; /* Alternating row colors */
}

.matrix_row_dark{
    background-color: #ffffff; /* Alternating row colors */
}

/* Style table cells */
.matrix_stars td {
    padding: 10px;
    text-align: left;
}

/* Style star rating elements */
.star {
    display: inline-block;
    font-size: 24px;
    color: #ffbb00;
    cursor: pointer;
    transition: color 0.2s;
}

/* Hover effect for stars */
.star:hover {
    color: #ffcc00;
}

/* Hide accessibility hidden text */
.accessibility_hidden {
/*    display: none;*/
}

/* Style the required icon */
.icon_required {
    color: #f00;
    font-size: 16px;
    margin-left: 5px;
}
.form_table {
    width: 650px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 0;
    border: 1px solid #D9DDE2;
    background: #FFFFFF;
    background-size: cover;
    color: #36454E;
    overflow: hidden;
    box-shadow: none;
    background-position: 50% 50%;
}
.q .matrix_stars .star, .q .icon_add, .q .icon_calendar, .q .icon_del {
    cursor: pointer;
    display: inline-block;
    height: 1.2em;
    position: relative;
    user-select: none;
    vertical-align: text-top;
    width: 1.5em;
}
.checklist h2 {
    font-size: 30px;
    font-weight: 600;
    color: #1e1f20;
    margin-bottom: 20px;
    padding: 15px 20px;
    text-align: center;
}
.checklist h2 span {
    background: linear-gradient(to right, #0861b9 11%, #ef5a28 102%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.form-check1 label {
    display: block;
    font-size: 14px;
    margin-top: 10px;
}
.form-check1 {
    padding: 0px 15px;
}
.form-check1 input {
    width: 100%;
    font-size: 14px;
    height: 34px;
    border: 1px solid #ddd;
}
.form-check1 select {
    width: 100%;
       font-size: 14px;
    height: 34px;
    border: 1px solid #ddd;
}
.form-check1 button {
    margin: 30px 0px;
    background: #f05a27;
    border: none;
    padding: 10px 20px;
    color: #fff;
    text-transform: uppercase;
}
.checked {
  color: orange;
}
</style>
</head>
<body>
    <h1>New Review Submitted!</h1>
    <p>Name: {{ $latestRecord->name }}</p>
    <p>Mobile: {{ $latestRecord->mobile }}</p>
    <p>Email: {{ $latestRecord->email }}</p>

    <div id="q27" class="q required">
               <a class an item_anchor name="ItemAnchor9"></a>
                <span class="question top_question">
                    @php
                    $data = json_decode($latestRecord->checklist_response, true);
                    $totalQuestionCount = 0;
                    @endphp

                     @if (!empty($data) && is_array($data))
                        @foreach ($data as $item)
                            <strong>{{ $item['top_question'] }}</strong><br><br>
                            <input type="hidden" name="data[{{ $loop->index }}][top_question]" value="{{ $item['top_question'] }}" class="rating"/>
                            @if (isset($item['question_set']) && is_array($item['question_set']))
                                <table class="matrix matrix_stars">
                                    <tbody>
                                        @foreach ($item['question_set'] as $index => $question)
                                            <tr class="{{ $index % 2 == 0 ? 'matrix_row_dark' : 'matrix_row_light' }}">
                                                <td style="width:360px;">
                                                    <div class="question-container">
                                                        <span class="question">{{ $question['question_name'] }}</span>
                                                        
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="rating-star">
                                                   
                                                    	<!-- Star Rating -->
														@for($i = 1; $i <= 5; $i++)
														    @if($i <= $question['stars'])
														        <span style="color: gold;">&#9733;</span>
														    @else
														        <span style="color: grey;">&#9733;</span>
														    @endif
														@endfor


                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            @endif
                        @endforeach
                    @endif
                </span>

            </div>


</body>
</html>
