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
    document.addEventListener('DOMContentLoaded', function (){
        var operatorOptions = {
            @foreach($teams as $team)
            '{{  $team->id}}': [
                @foreach($operators->where('team_id', $team->id) as $operator)
                {id : '{{$operator->id}}', name:'{{$operator->name}}'},
                @endforeach
            ],
            @endforeach
        }

        function uOO(teamSelect, operatorSelect) {
            var tSO = teamSelect.value;

            operatorSelect.innerHTML = '<option value="">Séléctionnez un opérateur</option>'
            if(operatorOptions[tSO]) {
                operatorOptions[tSO].forEach(function (opertor){
                    var option = document.createElement('option');
                    option.value = opertor.id;
                    option.text = opertor.name;
                    operatorSelect.add(option)
                });
            }
        }
        var operator = ['search_operator'];
        var team = ['search_team'];

        for(var i = 0; i < team.length; i++) {
            (function (index){
                var teamSelect = document.getElementById(team[index]);
                var operatorSelect  = document.getElementById(operator[index]);

                teamSelect.addEventListener('change', function (){
                    uOO(teamSelect, operatorSelect);
                });
                uOO(teamSelect, operatorSelect);
            })(i);
        }

    })

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
        function element(name) {
            return document.getElementsByName(name)[0];
        }

        let errorMessage = "";

        const numberOne = element("number_one");
        const numberTwo = element("number_two");
        const numberThree = element("number_three");
        const numberFour = element("number_four");

        const fields = [
            { task: element("task_one"), subtask: element("subtask_one"), number: numberOne, taskNumber: 1 },
            { task: element("task_two"), subtask: element("subtask_two"), number: numberTwo, taskNumber: 2 },
            { task: element("task_three"), subtask: element("subtask_three"), number: numberThree, taskNumber: 3 },
            { task: element("task_four"), subtask: element("subtask_four"), number: numberFour, taskNumber: 4 },
        ];

        fields.forEach(field => {
            field.task.classList.remove('errorFields');
            field.subtask.classList.remove('errorFields');
            if (field.number) {
                field.number.classList.remove('errorFields');
            }

            if (field.task.value.trim() !== "") {
                if (field.subtask.value.trim() === "") {
                    errorMessage += `Veuillez sélectionner une sous-tâche pour la tâche ${field.taskNumber}.\n`;
                    field.subtask.classList.add('errorFields');
                } else if (["1", "2", "3", "6", "7", "8"].includes(field.subtask.value.trim())) {
                    if (field.number && field.number.value.trim() === "") {
                        errorMessage += `Veuillez sélectionner un numéro d'OP pour la tâche ${field.taskNumber}.\n`;
                        if (field.number) {
                            field.number.classList.add('errorFields');
                        }
                    }
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

    function exportMsg() {
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
        $.ajax({
            url: "<?php echo e(route('exportToExcel')); ?>",
            method: 'GET',
            success: function(response) {
                startToast.close();

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
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'exportation vers Excel:', error);

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
                window.stop()
            }
        });
    }

    let searchTeam = '';

    let searchOperator = '';

    let searchDate = '';


    document.getElementById('searchForm').addEventListener('submit', function(event) {
    });

        document.getElementById('exportBtn').addEventListener('click', function(event) {
        event.preventDefault();

        window.location.href = '{{ route("exportToExcel") }}' + '?search_team=' + searchTeam + '&search_operator=' + searchOperator + '&search_date=' + searchDate;
    });
</script>
