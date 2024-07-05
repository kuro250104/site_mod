<script>
    document.addEventListener('DOMContentLoaded', function() {
        var taskOneSelect = document.getElementById('task_one');
        var taskTwoSelect = document.getElementById('task_two');
        var taskThreeSelect = document.getElementById('task_three');
        var taskFourSelect = document.getElementById('task_four');

        taskOneSelect.addEventListener('change', handleTaskChange);
        taskTwoSelect.addEventListener('change', handleTaskChange);
        taskThreeSelect.addEventListener('change', handleTaskChange);
        taskFourSelect.addEventListener('change', handleTaskChange);
        function handleTaskChange(event) {
            var selectedOptionValue = event.target.value;
            var taskNumber = event.target.id.split('_')[1];

            if (taskNumber === 'one' ||taskNumber === 'two' ||taskNumber === 'three' || taskNumber === 'four') {
                if (selectedOptionValue === '6') {
                    Swal.fire({
                        title: 'Attente séléctionné!',
                        text: 'Veuillez la décrire en commentaire.',
                        icon: 'warning',
                        confirmButtonText: 'OK'
                    });
                }
            }

        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var stageOptions = {
            @foreach($projects as $project)
            '{{ $project->id }}': [
                    @foreach($stages->where('project_id', $project->id) as $stage)
                { id: '{{ $stage->id }}', name: '{{ $stage->name }}' },
                @endforeach
            ],
            @endforeach
        };

        function updateStageOptions(projectSelect, stageSelect) {
            var selectedProject = projectSelect.value;


            stageSelect.innerHTML = '<option value="">Choisissez un stade</option>';
            if (stageOptions[selectedProject]) {
                stageOptions[selectedProject].forEach(function (stage) {
                    var option = document.createElement('option');
                    option.value = stage.id;
                    option.text = stage.name;
                    stageSelect.add(option);
                });
            }
        }

        var projects = ['project_one', 'project_two', 'project_three', 'project_four'];
        var stages = ['stage_one', 'stage_two', 'stage_three', 'stage_four'];

        for (var i = 0; i < projects.length; i++) {
            (function (index) {
                var projectSelect = document.getElementById(projects[index]);
                var stageSelect = document.getElementById(stages[index]);

                projectSelect.addEventListener('change', function () {
                    updateStageOptions(projectSelect, stageSelect);
                });

                updateStageOptions(projectSelect, stageSelect);
            })(i);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        var taskOptions = {
            @foreach($tasks as $task)
            '{{ $task->id }}': [
                    @foreach($subtasks->where('task_id', $task->id) as $subtask)
                { id: '{{ $subtask->id }}', name: '{{ $subtask->name }}' },
                @endforeach
            ],
            @endforeach
        };

        function updateSubtaskOptions(taskSelect, subtaskSelect) {
            var selectedTask = taskSelect.value;



            subtaskSelect.innerHTML = '<option value="">Choisissez une sous-tâche</option>';
            if (taskOptions[selectedTask]) {
                taskOptions[selectedTask].forEach(function (subtask) {
                    var option = document.createElement('option');
                    option.value = subtask.id;
                    option.text = subtask.name;
                    subtaskSelect.add(option);
                });
            }
        }

        var tasks = ['task_one', 'task_two', 'task_three', 'task_four'];
        var subtasks = ['subtask_one', 'subtask_two', 'subtask_three', 'subtask_four'];

        for (var i = 0; i < tasks.length; i++) {
            (function (index) {
                var taskSelect = document.getElementById(tasks[index]);
                var subtaskSelect = document.getElementById(subtasks[index]);

                // if (!taskSelect) {
                //     alert('L\'élément taskSelect avec l\'id ' + tasks[index] + ' n\'existe pas.');
                //     return;
                // }
                //
                // if (!subtaskSelect) {
                //     alert('L\'élément subtaskSelect avec l\'id ' + subtasks[index] + ' n\'existe pas.');
                //     return;
                // }

                taskSelect.addEventListener('change', function () {
                    updateSubtaskOptions(taskSelect, subtaskSelect);
                });

                updateSubtaskOptions(taskSelect, subtaskSelect);
            })(i);
        }
    });

    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("hourForm").addEventListener("submit", function(event) {
            if (!fieldCondition()) {
                event.preventDefault();
            }
        });
    });

    function fieldCondition() {
        function element(name){
            return document.getElementsByName(name)[0]
        }

        let errorMessage = "";

        const fields = [
            { task: element("task_one"), subtask: element("subtask_one"), number: element("number_one"), taskNumber: 1},
            { task: element("task_two"), subtask: element("subtask_two"), number: element("number_two"), taskNumber: 2},
            { task: element("task_three"), subtask: element("subtask_three"), number: element("number_three"), taskNumber: 3},
            { task: element("task_four"), subtask: element("subtask_four"), number: element("number_four"), taskNumber: 4},
        ];

        fields.forEach(field => {
            field.task.classList.remove('errorFields');
            field.subtask.classList.remove('errorFields');
            field.number.classList.remove('errorFields');

            if (field.task.value.trim() !== "") {
                if (field.subtask.value.trim() === "") {
                    errorMessage += `Veuillez sélectionner une sous-tâche pour la tâche ${field.taskNumber}.\n`;
                    field.subtask.classList.add('errorFields');
                }
            }

            if (field.subtask.value.trim() !== "") {
                if (["1", "2", "3", "6", "7", "8"].includes(field.subtask.value.trim())) {
                    errorMessage += `Veuillez sélectionner un numéro d'OP valide pour la tâche ${field.taskNumber}.\n`;
                    field.number.classList.add('errorFields');
                }
            }
        });

        if (errorMessage !== "") {
            alert(errorMessage);
            return false;
        }
        return true;
    }




    function verifyTimer() {
        let hourId = parseInt(document.getElementById('hour_id').value);
        let fields = ['timer_one', 'timer_two', 'timer_three', 'timer_four', 'timer_five'];

        let sum = 0;
        let limit = 0;

        switch (hourId) {
            case 1:
                limit = 6;
                break;
            case 2:
                limit = 7;
                break;
            case 3:
                limit = 7;
                break;
            case 4:
                limit = 8.5;
                break;
            case 5:
                limit = 6;
                break;
            default:
                limit = 0;
        }


        fields.forEach(function(field) {
            let fieldValue = parseFloat(document.getElementById(field).value) || 0;
            sum += fieldValue;

            if (sum > limit) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erreur',
                    text: 'La somme des heures dépasse la limite autorisée.'
                }).then((result) => {
                    document.getElementById('submitBtn').disabled = true;
                    document.getElementById('submitBtn').className = "btn btn-secondary btn-icon-split";
                    document.getElementById('sumDisplay').className = "text-danger";
                });
            } else {
                document.getElementById('submitBtn').disabled = false;
                document.getElementById('submitBtn').className = "btn btn-success btn-icon-split";
                document.getElementById('sumDisplay').className = "";
            }
            document.getElementById('sumDisplay').innerText = 'Total des heures : ' + sum;
        });
    }

    verifyTimer();

    let fields = document.querySelectorAll('[id^="timer_"]');
    fields.forEach(function(field) {
        field.addEventListener('input', verifyTimer);
    });





    function exportToExcel() {
        window.location.href = '/export-data';
    }

    function exportMsg() {
        // Afficher un toast pour indiquer que le processus commence
        const startToast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        startToast.fire({
            icon: "info",
            title: "Préparation de votre fichier, veuillez patienter..."
        });

        // Effectuer la requête AJAX pour l'exportation vers Excel
        $.ajax({
            url: "{{ route('exportToExcel') }}",
            method: 'GET',
            success: function(response) {
                // Masquer le toast de préparation
                startToast.close();

                // Afficher un toast de succès lorsque l'exportation est terminée
                const successToast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                successToast.fire({
                    icon: "success",
                    title: "Exportation vers Excel réussie, votre fichier va être téléchargé, veuillez patienter..."
                });

                // Ici vous pourriez éventuellement rediriger ou télécharger directement le fichier Excel
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'exportation vers Excel:', error);

                // Afficher un toast d'erreur si l'exportation échoue
                const errorToast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                errorToast.fire({
                    icon: "error",
                    title: "Erreur lors de l'exportation vers Excel"
                });
            }
        });
    }
</script>
