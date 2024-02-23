<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupération des éléments select pour chaque tâche
        var taskOneSelect = document.getElementById('task_one');
        var taskTwoSelect = document.getElementById('task_two');
        var taskThreeSelect = document.getElementById('task_three');
        var taskFourSelect = document.getElementById('task_four');

        // Ajout d'un écouteur d'événement 'change' pour chaque élément select
        taskOneSelect.addEventListener('change', handleTaskChange);
        taskTwoSelect.addEventListener('change', handleTaskChange);
        taskThreeSelect.addEventListener('change', handleTaskChange);
        taskFourSelect.addEventListener('change', handleTaskChange);

        // Fonction pour gérer le changement de valeur d'une tâche
        function handleTaskChange(event) {
            var selectedOptionValue = event.target.value;
            var taskNumber = event.target.id.split('_')[1];

            // Affichage d'une alerte pour les tâches 2 et 4
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
</script>
<script>
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
</script>

<script>
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

                // Vérifiez si les éléments HTML existent
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
</script>


<script>
    function verifierChamps() {
        const taskOne = document.getElementById("task_one");
        const taskTwo = document.getElementById("task_two");
        const taskThree = document.getElementById("task_three");
        const taskFour = document.getElementById("task_four");

        const numberOne = document.getElementsByName("number_one")[0];
        const numberTwo = document.getElementsByName("number_two")[0];
        const numberThree = document.getElementsByName("number_three")[0];
        const numberFour = document.getElementsByName("number_four")[0];

        numberOne.required = false;
        numberTwo.required = false;
        numberThree.required = false;
        numberFour.required = false;

        let errorMessage = "";

        if (taskOne.value === "1" || taskOne.value === "2" || taskOne.value === "3") {
            numberOne.required = true;
            if (numberOne.value.trim() === "") {
                errorMessage += "Veuillez remplir le champs numéro d'Op 1.\n";
            }
        }

        if (taskTwo.value === "1" || taskTwo.value === "2" || taskTwo.value === "3") {
            numberTwo.required = true;
            if (numberTwo.value === "") {
                errorMessage += "Veuillez remplir le champs numéro d'Op 2.\n";
            }
        }

        if (taskThree.value === "1" || taskThree.value === "2" || taskThree.value === "3") {
            numberThree.required = true;
            if (numberThree.value.trim() === "") {
                errorMessage += "Veuillez remplir le champs numéro d'Op 3.\n";
            }
        }

        if (taskFour.value === "1" || taskFour.value === "2" || taskFour.value === "3") {
            numberFour.required = true;
            if (numberFour.value.trim() === "") {
                errorMessage += "Veuillez remplir le champs numéro d'Op 4.\n";
            }
        }

        if (errorMessage !== "") {
            alert(errorMessage);
            console.log('oui')
            return false;
        }

        return true;
    }

</script>



<script>
    function verifierSomme() {
        var limite = parseInt(document.getElementById('timer').value);

        var valeur1 = parseInt(document.getElementById('timer_one').value) || 0;
        var valeur2 = parseInt(document.getElementById('timer_two').value) || 0;
        var valeur3 = parseInt(document.getElementById('timer_three').value) || 0;
        var valeur4 = parseInt(document.getElementById('timer_four').value) || 0;

        var somme = valeur1 + valeur2 + valeur3 + valeur4;

        if (somme > limite) {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: 'La somme des heures dépasse la limite autorisée.',
            }).then((result) => {

            });

            document.getElementById('submitBtn').disabled = false;
            document.getElementById('submitBtn').className = "btn btn-secondary btn-icon-split";
            return false;


        } else {
            // document.getElementById('messageErreur').innerHTML = '';
            document.getElementById('submitBtn').disabled = false;
            document.getElementById('submitBtn').className = "btn btn-success btn-icon-split";
        }
    }


</script>

<script>
    function exportToExcel() {
        var table = document.getElementById("dataTable");

        var wb = XLSX.utils.table_to_book(table);

        var binaryData = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

        var blob = new Blob([s2ab(binaryData)], { type: 'application/octet-stream' });

        saveAs(blob, 'tableau_excel.xlsx');
    }

    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i = 0; i < s.length; i++) {
            view[i] = s.charCodeAt(i) & 0xFF;
        }
        return buf;
    }
</script>





