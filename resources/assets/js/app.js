(function($) {
    'use strict';

    var deleteQuestionSelector = '[data-delete-question]';

    function getQuestionHtml() {
        var index = getQuestionHtml.counter++;
        var $questionTmpl = $(`
            <div class="question" data-quiz-question>
                <input type="hidden" name="questions[` + index + `][answers]" value="[]">

                <div class="form-group">
                    <input type="text" name="questions[` + index + `][body]"
                     class="form-control" placeholder="Question" required>
                </div>

                <div class="form-group text-right">
                    <button type="button" class="btn btn-danger" data-delete-question>Delete</button>
                </div>
            </div>
        `);

        return $questionTmpl;
    }

    getQuestionHtml.counter = 0;

    // function getQuestionHtml(question) {
    //     $questionTmpl = $questionTmpl.clone();
    //     $questionTmpl.find('[name="question[]"]').val(question.body);
    // }

    $('[data-quiz-questions-input]').each(function() {
        var $questionsInput  = $(this);
        var $questionsWrap   = $questionsInput.find('[data-quiz-questions-input-wrap]');
        var $addQuestionBtns = $questionsInput.find('[data-add-question]');
        // var $deleteQuestionBtns = $questionsInput.find(deleteQuestionSelector);
        // var questions = $questionsInput.find('[name="questions"]').val();

        $addQuestionBtns.click(function(e) {
            e.preventDefault();
            $questionsWrap.append( getQuestionHtml() );
        });

        $questionsWrap.on('click', deleteQuestionSelector, function(e) {
            e.preventDefault();
            var $this = $(this);

            $this.parents('[data-quiz-question]').remove();
        });
    });
})(jQuery);
