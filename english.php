<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>English Test</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/kraeplin.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between">
        <a class="navbar-brand" href="#">English Test</a>
    </nav>

    <main role="main" class="container">
        <div class="starter-template" id="row1">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <form action="" method="post" id="formenglish">
                        <div class="form-group">
                            <!-- <h2>English Test</h2> -->
                            <p style="text-align: left;">This test will end in <span id="countdown">5:00</span></p>
                            <textarea class="form-control" name="" cols="30" rows="15" id="words"></textarea>
                            <div class="word-count" style="text-align: left;">No. of words: <span id="count">0</span></div>
                            <div style="text-align: right;">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="style/js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="style/js/jquery-slim.min.js"><\/script>')
    </script>
    <script src="style/js/popper.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script>
        // counting words
        const wordsTextarea = document.getElementById("words");
        const wordCount = document.getElementById("count");

        $("#words").keyup(function() {
            let words = wordsTextarea.value;
            let wordsTrimmed = words.replace(/\s+/g, " ").trim();
            let splitWords = wordsTrimmed.split(" ");

            console.log(splitWords);

            let numberOfWords = splitWords.length;
            if (splitWords[0] == "") {
                numberOfWords = 0;
            }

            wordCount.innerHTML = numberOfWords;
        });

        // timer
        function countdown() {
            var timeleft = 300; // 5 minutes in seconds
            var downloadTimer = setInterval(function() {
                var minutes = Math.floor(timeleft / 60);
                var seconds = timeleft % 60;
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }
                document.getElementById("countdown").innerHTML = minutes + ":" + seconds;
                timeleft -= 1;
                if (timeleft <= 0) {
                    document.getElementById("formenglish").submit();
                }
            }, 1000);
        }

        countdown();
    </script>
</body>

</html>