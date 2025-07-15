const quizData = [
            { question: "Ali punya 5 apel. Dia membeli 10 apel lagi, lalu memberikan 3 apel kepada temannya. Berapa sisa apel Ali?", answers: ["12", "15", "8", "5"], correct: "12" },
            { question: "Angka berikutnya dalam deret ini adalah: 2, 5, 8, 11, ...?", answers: ["14", "12", "13", "15"], correct: "14" },
            { question: "Sebuah taman berbentuk persegi panjang memiliki panjang 8 meter dan lebar 5 meter. Berapa luas taman tersebut?", answers: ["40 m²", "13 m²", "26 m²", "30 m²"], correct: "40 m²" },
            { question: "Sebuah film dimulai pukul 19:30 dan berlangsung selama 90 menit. Pukul berapa film tersebut akan berakhir?", answers: ["21:00", "20:00", "20:30", "21:30"], correct: "21:00" },
            { question: "Seorang guru memiliki 48 permen dan ingin membagikannya secara merata kepada 6 muridnya. Berapa permen yang diterima setiap murid?", answers: ["8", "6", "7", "42"], correct: "8" },
            { question: "Umur Budi 3 tahun lebih tua dari Ani. Jika umur Ani sekarang 10 tahun, berapa umur Budi?", answers: ["13 tahun", "7 tahun", "10 tahun", "30 tahun"], correct: "13 tahun" },
            { question: "Sebuah pizza dipotong menjadi 8 bagian sama besar. Jika kamu memakan seperempat (1/4) dari pizza tersebut, berapa potong yang kamu makan?", answers: ["2 potong", "1 potong", "4 potong", "8 potong"], correct: "2 potong" },
            { question: "Nilai ujian matematika Rina adalah 85, 90, dan 95. Berapa nilai rata-rata ujian Rina?", answers: ["90", "85", "95", "270"], correct: "90" },
            { question: "Sari membeli 3 buku tulis dengan harga Rp 2.000 per buku dan 2 pensil dengan harga Rp 1.000 per pensil. Berapa total uang yang harus dibayar Sari?", answers: ["Rp 8.000", "Rp 6.000", "Rp 5.000", "Rp 10.000"], correct: "Rp 8.000" },
            { question: "Lanjutkan pola bilangan berikut: 3, 9, 27, ... Angka selanjutnya adalah?", answers: ["81", "30", "54", "36"], correct: "81" }
        ];

        const quizContainer = document.getElementById('quiz-container');
        const resultsContainer = document.getElementById('results-container');
        const reviewContainer = document.getElementById('review-container');

        const questionNumberEl = document.getElementById('question-number');
        const questionTextEl = document.getElementById('question-text');
        const answerListEl = document.getElementById('answer-list');
        const submitBtn = document.getElementById('submit-btn');
        const scoreTextEl = document.getElementById('score-text');
        
        const restartBtn = document.getElementById('restart-btn');
        const reviewBtn = document.getElementById('review-btn');

        let currentQuestionIndex = 0;
        let score = 0;
        let userAnswers = [];
        let selectedAnswer = null;

        function loadQuiz() {
            selectedAnswer = null;
            const currentQuizData = quizData[currentQuestionIndex];

            questionNumberEl.innerText = `Soal ${currentQuestionIndex + 1} dari ${quizData.length}`;
            questionTextEl.innerText = currentQuizData.question;
            answerListEl.innerHTML = ''; 

            currentQuizData.answers.forEach(answer => {
                const li = document.createElement('li');
                li.innerText = answer;
                li.addEventListener('click', () => {
                    document.querySelectorAll('#answer-list li').forEach(item => item.classList.remove('selected'));
                    li.classList.add('selected');
                    selectedAnswer = answer;
                });
                answerListEl.appendChild(li);
            });
        }
        
        function showResults() {
            quizContainer.style.display = 'none';
            reviewContainer.style.display = 'none';
            resultsContainer.style.display = 'block';
            scoreTextEl.innerHTML = `Skor Anda: <strong>${score * 10}</strong> <br> (Anda menjawab benar ${score} dari ${quizData.length} soal)`;
        }

        function showReview() {
            resultsContainer.style.display = 'none';
            reviewContainer.style.display = 'block';
            reviewContainer.innerHTML = '<h3 class="text-center mb-4">Ulasan Jawaban</h3>';

            quizData.forEach((quizItem, index) => {
                const userAnswer = userAnswers[index];
                const isCorrect = userAnswer === quizItem.correct;
                
                const reviewCard = document.createElement('div');
                reviewCard.className = `card shadow-sm mb-3 review-card ${isCorrect ? 'correct' : 'incorrect'}`;
                
                let cardBodyHTML = `
                    <div class="card-body">
                        <p class="fw-bold">${index + 1}. ${quizItem.question}</p>
                        <p class="mb-1">Jawaban Anda: <span class="fw-bold ${isCorrect ? 'text-success' : 'text-danger'}">${userAnswer || 'Tidak dijawab'} ${isCorrect ? '✔️' : '❌'}</span></p>
                `;

                if (!isCorrect) {
                    cardBodyHTML += `<p class="mb-0">Jawaban Benar: <span class="fw-bold text-success">${quizItem.correct}</span></p>`;
                }

                cardBodyHTML += '</div>';
                reviewCard.innerHTML = cardBodyHTML;
                reviewContainer.appendChild(reviewCard);
            });
            
            const backButton = document.createElement('button');
            backButton.className = 'btn btn-primary w-100 mt-3';
            backButton.innerText = 'Kembali ke Hasil';
            backButton.onclick = showResults;
            reviewContainer.appendChild(backButton);
        }

        submitBtn.addEventListener('click', () => {
            if (selectedAnswer) {
                userAnswers[currentQuestionIndex] = selectedAnswer;
                if (selectedAnswer === quizData[currentQuestionIndex].correct) {
                    score++;
                }

                currentQuestionIndex++;
                if (currentQuestionIndex < quizData.length) {
                    loadQuiz();
                } else {
                    showResults();
                }
            } else {
                alert("Silakan pilih salah satu jawaban terlebih dahulu!");
            }
        });
        
        restartBtn.addEventListener('click', () => {
            currentQuestionIndex = 0;
            score = 0;
            userAnswers = [];
            resultsContainer.style.display = 'none';
            quizContainer.style.display = 'block';
            loadQuiz();
        });

        reviewBtn.addEventListener('click', showReview);

        loadQuiz();