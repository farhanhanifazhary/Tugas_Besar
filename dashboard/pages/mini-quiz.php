<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Soal Interaktif</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/mini-quiz.css">
</head>
<body>

    <div class="quiz-wrapper">
        <div id="quiz-container" class="quiz-container">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3" id="question-number"></h5>
                    <p class="card-text fs-5" id="question-text"></p>
                    <ul class="answer-option" id="answer-list">
                        </ul>
                    <button id="submit-btn" class="btn btn-primary w-100 mt-3">Lanjut</button>
                </div>
            </div>
        </div>

        <div id="results-container" class="quiz-container text-center">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h2 class="card-title">🎉 Selesai! 🎉</h2>
                    <p class="fs-4 mt-3" id="score-text"></p>
                    <p class="text-muted">Terima kasih telah mengerjakan latihan ini.</p>
                    <button id="review-btn" class="btn btn-info mt-2">Review Jawaban</button>
                    <button id="restart-btn" class="btn btn-secondary mt-2">Ulangi Latihan</button>
                    <a href="../index.php?folder=pages&file=dashboard" class="btn btn-primary mt-2">Kembali ke Dashboard</a>
                </div>
            </div>
        </div>
        
        <div id="review-container" class="quiz-container">
             </div>

    </div>

    <script src="../js/mini-quiz.js"></script>
</body>
</html>