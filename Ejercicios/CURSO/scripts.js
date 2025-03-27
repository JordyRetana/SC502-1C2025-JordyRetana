$(document).ready(function () {
    function updateTotalCredits() {
        let totalCredits = 0;
        $('.creditInput').each(function () {
            const value = parseInt($(this).val()) || 0;
            totalCredits += value;
        });
        $('#totalCredits').val(totalCredits); 
    }

    $('#addCourse').on('click', function () {
        const courseCount = $('#coursesContainer .card').length + 1;

        const newCard = `
            <div class="card">
                <div class="title-1">Curso ${courseCount}</div>
                <div class="content">
                    <label for="courseName${courseCount}">Nombre del Curso:</label>
                    <input type="text" name="courseName[]" id="courseName${courseCount}" required>
                    <label for="courseCredits${courseCount}">Créditos:</label>
                    <input type="number" name="courseCredits[]" id="courseCredits${courseCount}" min="1" class="creditInput" required>
                </div>
            </div>
        `;
        $('#coursesContainer').append(newCard);

        $(`#courseCredits${courseCount}`).on('input', updateTotalCredits);
    });

    $(document).on('input', '.creditInput', updateTotalCredits);
});