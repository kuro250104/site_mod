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
    function fieldCondition() {
        const taskOne = document.getElementById("task_one");
        const taskTwo = document.getElementById("task_two");
        const taskThree = document.getElementById("task_three");
        const taskFour = document.getElementById("task_four");

        const subtaskOne = document.getElementById("subtask_one")
        const subtaskTwo = document.getElementById("subtask_two")
        const subtaskThree = document.getElementById("subtask_three")
        const subtaskFour = document.getElementById("subtask_three")

        const numberOne = document.getElementsByName("number_one")[0];
        const numberTwo = document.getElementsByName("number_two")[0];
        const numberThree = document.getElementsByName("number_three")[0];
        const numberFour = document.getElementsByName("number_four")[0];

        numberOne.required = false;
        numberTwo.required = false;
        numberThree.required = false;
        numberFour.required = false;

        let errorMessage = "";

        if (taskOne.value === "1" || taskOne.value === "2"|| taskOne.value ==="3" ) {
            if(subtaskOne.value ==="1"||subtaskOne.value ==="2"||subtaskOne.value ==="3"||subtaskOne.value ==="6"||subtaskOne.value ==="7"||subtaskOne.value ==="8"){
                if (numberOne.value.trim() === "") {
                    errorMessage += "Veuillez remplir le champs numéro d'OP de la tâche 1.\n";
                }
            }
        }

        if (taskTwo.value === "1"  || taskTwo.value === "2" || taskTwo.value ==="3") {
            if (subtaskTwo.value === "1" || subtaskTwo.value === "2" || subtaskTwo.value === "3" || subtaskTwo.value === "6" || subtaskTwo.value === "7" || subtaskTwo.value === "8"){
                if (numberTwo.value === "") {
                    errorMessage += "Veuillez remplir le champs numéro d'OP de la tâche 2.\n";
                }
            }
        }

        if (taskThree.value === "1"  || taskThree.value === "2"||taskThree.value ==="3") {
            if(subtaskThree.value ==="1"||subtaskThree.value ==="2"||subtaskThree.value ==="3"||subtaskThree.value ==="6"||subtaskThree.value ==="7"||subtaskThree.value ==="8"){
                if (numberThree.value.trim() === "") {
                    errorMessage += "Veuillez remplir le champs numéro d'OP de la tâche 3.\n";
                }
            }
        }

        if (taskFour.value === "1"|| taskFour.value === "2" || taskFour.value === "3") {
            if(subtaskFour.value ==="1" ||subtaskFour.value ==="2" ||subtaskFour.value ==="3" ||subtaskFour.value ==="1" ||subtaskFour.value ==="7" ||subtaskFour.value ==="8" )
            if (numberFour.value.trim() === "") {
                errorMessage += "Veuillez remplir le champs numéro d'OP de la tâche 4.\n";
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

</script>



<script>
    function exportToExcel() {
        window.location.href = '/export-data';
    }
</script>

<script>
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

