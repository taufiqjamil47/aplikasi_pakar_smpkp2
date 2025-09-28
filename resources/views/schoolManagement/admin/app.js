document.addEventListener('DOMContentLoaded', function () {
    // Generate a larger set of students (40 students)
    const students = generateStudents(40);

    // Store student groups
    const studentGroups = [];

    // Current group being built
    const currentGroup = [];

    // Display all students
    displayStudents(students);

    // Populate student dropdown
    populateStudentDropdown(students);

    // Add event listener to add student button
    document.getElementById('addStudentBtn').addEventListener('click', function () {
        const studentId = document.getElementById('studentSelect').value;
        if (!studentId) return;

        const student = students.find(s => s.id === parseInt(studentId));
        if (!student) return;

        // Check if student is already in a group
        const isAlreadyGrouped = studentGroups.some(group =>
            group.some(id => id === student.id)
        );

        if (isAlreadyGrouped) {
            alert("This student is already in another group");
            return;
        }

        // Check if student is already in current group
        if (currentGroup.includes(student.id)) {
            alert("This student is already in the current group");
            return;
        }

        // Check if adding this student would exceed the max group size
        if (currentGroup.length >= 5) {
            alert("A group can have a maximum of 5 students");
            return;
        }

        // Add student to current group
        currentGroup.push(student.id);

        // Update UI
        updateCurrentGroupDisplay(students, currentGroup);

        // Reset dropdown
        document.getElementById('studentSelect').value = "";

        // Enable/disable buttons
        document.getElementById('clearGroupBtn').disabled = currentGroup.length === 0;
        document.getElementById('saveGroupBtn').disabled = currentGroup.length < 2;
    });

    // Add event listener to student select dropdown
    document.getElementById('studentSelect').addEventListener('change', function () {
        document.getElementById('addStudentBtn').disabled = !this.value;
    });

    // Add event listener to clear group button
    document.getElementById('clearGroupBtn').addEventListener('click', function () {
        currentGroup.length = 0;
        updateCurrentGroupDisplay(students, currentGroup);

        // Disable buttons
        document.getElementById('clearGroupBtn').disabled = true;
        document.getElementById('saveGroupBtn').disabled = true;
    });

    // Add event listener to save group button
    document.getElementById('saveGroupBtn').addEventListener('click', function () {
        if (currentGroup.length < 2) {
            alert("A group must have at least 2 students");
            return;
        }

        // Add current group to saved groups
        studentGroups.push([...currentGroup]);

        // Clear current group
        currentGroup.length = 0;
        updateCurrentGroupDisplay(students, currentGroup);

        // Update saved groups display
        updateSavedGroupsDisplay(students, studentGroups);

        // Update student cards to show grouped status
        displayStudents(students);

        // Disable buttons
        document.getElementById('clearGroupBtn').disabled = true;
        document.getElementById('saveGroupBtn').disabled = true;
    });

    // Add event listener to generate button
    document.getElementById('generateBtn').addEventListener('click', function () {
        const studentsPerClass = parseInt(document.getElementById('studentsPerClass').value);
        if (studentsPerClass < 5 || studentsPerClass > 50) {
            alert("Students per class must be between 5 and 50");
            return;
        }
        generateClassAssignments(students, studentsPerClass, studentGroups);
    });

    // Function to generate random students
    function generateStudents(count) {
        const firstNames = ["Ahmad", "Budi", "Citra", "Dewi", "Eko", "Fitri", "Gunawan", "Hendra", "Indra", "Joko", "Kartika", "Lina", "Maya", "Nadia", "Oki", "Putri", "Rudi", "Siti", "Tono", "Umar"];
        const middleNames = ["Adi", "Bintang", "Cahya", "Dian", "Eka", "Fajar", "Gita", "Hadi", "Indah", "Jaya", "Kusuma", "Laras", "Maulana", "Nugraha", "Oktavia", "Pratama", "Ratna", "Surya", "Tirta", "Utama"];
        const lastNames = ["Pratama", "Wijaya", "Sari", "Putra", "Lestari", "Setiawan", "Wibowo", "Santoso", "Rahmawati", "Nugroho", "Handayani", "Saputra", "Ningrum", "Kusuma", "Hartono", "Anggraini", "Wibisono", "Rahman", "Putri", "Hidayat"];

        const students = [];

        for (let i = 1; i <= count; i++) {
            // Generate a random name
            const firstName = firstNames[Math.floor(Math.random() * firstNames.length)];
            const middleName = middleNames[Math.floor(Math.random() * middleNames.length)];
            const lastName = lastNames[Math.floor(Math.random() * lastNames.length)];

            // Ensure we have some students with the same first name
            const name = i <= 15 ?
                `${firstNames[i % 5]} ${middleName} ${lastName}` :
                `${firstName} ${middleName} ${lastName}`;

            // Generate a random grade between 70 and 100
            const grade = Math.floor(Math.random() * 31) + 70;

            students.push({ id: i, name, grade });
        }

        return students;
    }

    // Function to populate student dropdown
    function populateStudentDropdown(studentList) {
        const studentSelect = document.getElementById('studentSelect');

        // Clear existing options
        studentSelect.innerHTML = '<option value="">Select a student</option>';

        // Add student options
        studentList.forEach(student => {
            const option = document.createElement('option');
            option.value = student.id;
            option.textContent = `${student.name} (Grade: ${student.grade})`;
            studentSelect.appendChild(option);
        });
    }

    // Function to update the current group display
    function updateCurrentGroupDisplay(studentList, group) {
        const groupMembers = document.getElementById('groupMembers');
        const groupCount = document.getElementById('groupCount');

        // Update count
        groupCount.textContent = `${group.length}/5`;

        // Update members list
        if (group.length === 0) {
            groupMembers.innerHTML = '<p class="text-gray-500 italic">No students added to this group yet</p>';
            return;
        }

        groupMembers.innerHTML = '';
        group.forEach(studentId => {
            const student = studentList.find(s => s.id === studentId);
            if (!student) return;

            const memberEl = document.createElement('div');
            memberEl.className = 'group-member flex justify-between items-center bg-white p-2 rounded-lg shadow-sm';
            memberEl.innerHTML = `
                        <div class="flex items-center">
                            <div class="bg-indigo-100 rounded-full p-2 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-sm">${student.name}</p>
                                <p class="text-xs text-gray-500">Grade: ${student.grade}</p>
                            </div>
                        </div>
                        <button class="remove-student text-red-500 hover:text-red-700" data-id="${student.id}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    `;
            groupMembers.appendChild(memberEl);

            // Add event listener to remove button
            memberEl.querySelector('.remove-student').addEventListener('click', function () {
                const studentId = parseInt(this.getAttribute('data-id'));
                const index = group.indexOf(studentId);
                if (index !== -1) {
                    group.splice(index, 1);
                    updateCurrentGroupDisplay(studentList, group);

                    // Enable/disable buttons
                    document.getElementById('clearGroupBtn').disabled = group.length === 0;
                    document.getElementById('saveGroupBtn').disabled = group.length < 2;
                }
            });
        });
    }

    // Function to update the saved groups display
    function updateSavedGroupsDisplay(studentList, groups) {
        const savedGroups = document.getElementById('savedGroups');
        const groupsContainer = document.getElementById('groupsContainer');

        // Show the groups section if there are groups
        if (groups.length > 0) {
            savedGroups.classList.remove('hidden');
        } else {
            savedGroups.classList.add('hidden');
            return;
        }

        // Clear existing groups
        groupsContainer.innerHTML = '';

        // Add each group
        groups.forEach((group, index) => {
            const groupStudents = group.map(id => studentList.find(s => s.id === id)).filter(Boolean);
            const hasHighScorer = groupStudents.some(s => s.grade > 90);

            const groupEl = document.createElement('div');
            groupEl.className = 'bg-white p-3 rounded-lg shadow-sm border border-purple-200 relative';

            // Add group badge
            const groupBadge = document.createElement('div');
            groupBadge.className = 'group-badge';
            groupBadge.textContent = index + 1;
            groupEl.appendChild(groupBadge);

            // Group header
            const header = document.createElement('div');
            header.className = 'flex justify-between items-center mb-2';
            header.innerHTML = `
                        <h4 class="font-medium text-purple-800">Group ${index + 1}</h4>
                        <button class="remove-group-btn text-red-500 hover:text-red-700" data-index="${index}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    `;
            groupEl.appendChild(header);

            // Group members
            const membersList = document.createElement('div');
            membersList.className = 'space-y-1';

            groupStudents.forEach(student => {
                const isHighScore = student.grade > 89;
                const memberItem = document.createElement('div');
                memberItem.className = `text-sm ${isHighScore ? 'text-amber-700' : 'text-gray-600'}`;
                memberItem.textContent = `${student.name} (${student.grade})`;
                membersList.appendChild(memberItem);
            });

            groupEl.appendChild(membersList);

            // Add warning if group has high scorer
            if (hasHighScorer) {
                const warning = document.createElement('div');
                warning.className = 'mt-2 text-xs text-amber-600 flex items-center';
                warning.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Contains high-scoring student
                        `;
                groupEl.appendChild(warning);
            }

            groupsContainer.appendChild(groupEl);

            // Add event listener to remove button
            groupEl.querySelector('.remove-group-btn').addEventListener('click', function () {
                const groupIndex = parseInt(this.getAttribute('data-index'));
                groups.splice(groupIndex, 1);
                updateSavedGroupsDisplay(studentList, groups);

                // Update student cards
                displayStudents(studentList);
            });
        });
    }

    // Function to display students
    function displayStudents(studentList) {
        const studentListContainer = document.getElementById('studentList');
        studentListContainer.innerHTML = '';

        studentList.forEach(student => {
            const isHighScore = student.grade > 90;
            const isGrouped = studentGroups.some(group => group.includes(student.id)) ||
                currentGroup.includes(student.id);

            const studentCard = document.createElement('div');
            studentCard.className = `student-card ${isHighScore ? 'high-score' : 'bg-white'} ${isGrouped ? 'paired' : ''} p-4 rounded-lg shadow-sm border border-gray-200`;

            const gradeClass = isHighScore ? 'bg-amber-500' : 'bg-gray-200';
            const gradeTextClass = isHighScore ? 'text-white' : 'text-gray-700';

            studentCard.innerHTML = `
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="bg-indigo-100 rounded-full p-3 mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800">${student.name}</h3>
                                    <p class="text-sm text-gray-500">ID: ${student.id}</p>
                                </div>
                            </div>
                            <div class="${gradeClass} ${gradeTextClass} text-sm font-bold rounded-full w-10 h-10 flex items-center justify-center">
                                ${student.grade}
                            </div>
                        </div>
                    `;
            studentListContainer.appendChild(studentCard);
        });
    }

    // Function to generate class assignments
    function generateClassAssignments(studentList, studentsPerClass, groups) {
        // Clear previous assignments
        document.getElementById('classA').innerHTML = '';
        document.getElementById('classB').innerHTML = '';
        document.getElementById('classC').innerHTML = '';
        document.getElementById('classD').innerHTML = '';

        // Hide any previous messages
        document.getElementById('resultMessage').classList.add('hidden');
        document.getElementById('errorMessage').classList.add('hidden');

        // Create a copy of students to work with
        const studentsCopy = [...studentList];

        // Sort students by grade (descending) to handle high-scoring students first
        studentsCopy.sort((a, b) => b.grade - a.grade);

        // Create class containers
        const classes = {
            'A': {
                element: document.getElementById('classA'),
                countElement: document.getElementById('classACount'),
                students: [],
                firstNames: {},
                hasHighScorer: false
            },
            'B': {
                element: document.getElementById('classB'),
                countElement: document.getElementById('classBCount'),
                students: [],
                firstNames: {},
                hasHighScorer: false
            },
            'C': {
                element: document.getElementById('classC'),
                countElement: document.getElementById('classCCount'),
                students: [],
                firstNames: {},
                hasHighScorer: false
            },
            'D': {
                element: document.getElementById('classD'),
                countElement: document.getElementById('classDCount'),
                students: [],
                firstNames: {},
                hasHighScorer: false
            }
        };

        // First, handle grouped students
        const groupedStudentIds = new Set(groups.flat());
        const groupedStudents = studentsCopy.filter(student => groupedStudentIds.has(student.id));
        const ungroupedStudents = studentsCopy.filter(student => !groupedStudentIds.has(student.id));

        // Group students by their groups
        const studentGroups = groups.map(group => {
            return {
                students: studentList.filter(student => group.includes(student.id)),
                highScorer: studentList.filter(student => group.includes(student.id)).some(s => s.grade > 90)
            };
        });

        // Assign grouped students first
        for (const group of studentGroups) {
            // Find the best class for this group
            let bestClass = null;
            let bestScore = -Infinity;

            for (const className in classes) {
                const classObj = classes[className];

                // Skip if adding this group would exceed the class size
                if (classObj.students.length + group.students.length > studentsPerClass) {
                    continue;
                }

                // Skip if this group has a high scorer and the class already has one
                if (group.highScorer && classObj.hasHighScorer) {
                    continue;
                }

                // Calculate a score for this class based on name distribution
                let score = 0;
                let canAssign = true;

                // Check first name constraints
                const firstNameCounts = {};

                // Count existing first names in the class
                for (const student of classObj.students) {
                    const firstName = student.name.split(' ')[0];
                    if (!firstNameCounts[firstName]) {
                        firstNameCounts[firstName] = 1;
                    } else {
                        firstNameCounts[firstName]++;
                    }
                }

                // Check if adding this group would violate the first name constraint
                for (const student of group.students) {
                    const firstName = student.name.split(' ')[0];
                    const currentCount = firstNameCounts[firstName] || 0;

                    if (currentCount + 1 > 3) { // Changed from 2 to 3
                        canAssign = false;
                        break;
                    }

                    // Update the count for checking subsequent students
                    if (!firstNameCounts[firstName]) {
                        firstNameCounts[firstName] = 1;
                    } else {
                        firstNameCounts[firstName]++;
                    }
                }

                if (!canAssign) continue;

                // Higher score for classes with fewer students overall
                score -= classObj.students.length * 0.5;

                if (score > bestScore) {
                    bestScore = score;
                    bestClass = className;
                }
            }

            // If we found a suitable class, assign all students in the group
            if (bestClass) {
                for (const student of group.students) {
                    assignStudentToClass(student, classes[bestClass]);
                }
            }
        }

        // Next, handle high-scoring ungrouped students
        const highScorers = ungroupedStudents.filter(student => student.grade > 90);
        const regularStudents = ungroupedStudents.filter(student => student.grade <= 80);

        // Assign high scorers to different classes first
        for (const student of highScorers) {
            // Find the best class for this high-scoring student
            let bestClass = null;
            let bestScore = -Infinity;

            for (const className in classes) {
                const classObj = classes[className];

                // Skip classes that already have the maximum number of students
                if (classObj.students.length >= studentsPerClass) continue;

                // Skip classes that already have a high scorer
                if (classObj.hasHighScorer) continue;

                // Calculate a score for this class
                const firstName = student.name.split(' ')[0];
                const sameNameCount = classObj.firstNames[firstName] || 0;

                // Skip if adding this student would exceed the name limit
                if (sameNameCount >= 3) continue; // Changed from 2 to 3

                // Higher score for classes with fewer students
                let score = -classObj.students.length;

                // Higher score for classes with fewer students with the same name
                score -= sameNameCount * 2; // Default : 2

                if (score > bestScore) {
                    bestScore = score;
                    bestClass = className;
                }
            }

            // If we found a suitable class, assign the student
            if (bestClass) {
                assignStudentToClass(student, classes[bestClass]);
            }
        }

        // Finally, assign remaining regular students
        for (const student of regularStudents) {
            // Find the best class for this student
            let bestClass = null;
            let bestScore = -Infinity;

            for (const className in classes) {
                const classObj = classes[className];

                // Skip classes that already have the maximum number of students
                if (classObj.students.length >= studentsPerClass) continue;

                // Calculate a score for this class
                const firstName = student.name.split(' ')[0];
                const sameNameCount = classObj.firstNames[firstName] || 0;

                // Skip if adding this student would exceed the name limit
                if (sameNameCount >= 3) continue; // Changed from 2 to 3

                // Higher score for classes with fewer students
                let score = -classObj.students.length;

                // Higher score for classes with fewer students with the same name
                score -= sameNameCount * 2;

                if (score > bestScore) {
                    bestScore = score;
                    bestClass = className;
                }
            }

            // If we found a suitable class, assign the student
            if (bestClass) {
                assignStudentToClass(student, classes[bestClass]);
            }
        }

        // Check if all students were assigned
        const totalAssigned = Object.values(classes).reduce((sum, classObj) => sum + classObj.students.length, 0);

        if (totalAssigned < studentList.length) {
            // Show error message
            document.getElementById('errorMessage').classList.remove('hidden');
            document.getElementById('errorText').textContent =
                `Could only assign ${totalAssigned} out of ${studentList.length} students while following all rules.`;

            // Find unassigned students
            const unassignedStudents = [...studentsCopy].filter(student =>
                !Object.values(classes).some(classObj =>
                    classObj.students.some(s => s.id === student.id)
                )
            );

            // Try to assign them to classes with space, even if it means breaking the name rule
            // but still respecting the high scorer rule
            for (const student of unassignedStudents) {
                const isHighScorer = student.grade > 90;

                // Find a class with space that doesn't already have a high scorer if this student is one
                for (const className in classes) {
                    const classObj = classes[className];

                    // Skip if class is full
                    if (classObj.students.length >= studentsPerClass) continue;

                    // Skip if this is a high scorer and the class already has one
                    if (isHighScorer && classObj.hasHighScorer) continue;

                    // Assign to this class
                    assignStudentToClass(student, classObj);
                    break;
                }
            }
        } else {
            // Show success message
            document.getElementById('resultMessage').classList.remove('hidden');
        }

        // Sort students alphabetically in each class and display them
        for (const className in classes) {
            const classObj = classes[className];
            const classElement = classObj.element;

            // Sort students alphabetically by name
            classObj.students.sort((a, b) => a.name.localeCompare(b.name));

            // Update the counter
            classObj.countElement.textContent = `${classObj.students.length}/${studentsPerClass}`;

            if (classObj.students.length === 0) {
                classElement.innerHTML = '<p class="text-gray-500 text-center italic mt-10">No students assigned</p>';
                continue;
            }

            classElement.innerHTML = '';

            // Group students by their groups for display
            const groupedStudents = {};

            // First, identify which group each student belongs to
            for (let i = 0; i < studentGroups.length; i++) {
                const group = studentGroups[i];
                for (const student of group.students) {
                    if (classObj.students.some(s => s.id === student.id)) {
                        if (!groupedStudents[i]) {
                            groupedStudents[i] = [];
                        }
                        groupedStudents[i].push(student);
                    }
                }
            }

            // Display grouped students first
            for (const groupIndex in groupedStudents) {
                const groupContainer = document.createElement('div');
                groupContainer.className = 'mb-3 bg-purple-50 p-2 rounded-lg border border-purple-200';

                const groupHeader = document.createElement('div');
                groupHeader.className = 'text-xs font-medium text-purple-800 mb-1';
                groupHeader.textContent = `Group ${parseInt(groupIndex) + 1}`;
                groupContainer.appendChild(groupHeader);

                const students = groupedStudents[groupIndex];
                for (const student of students) {
                    const isHighScore = student.grade > 89;

                    const studentEl = document.createElement('div');
                    studentEl.className = `${isHighScore ? 'bg-amber-50' : 'bg-white'} rounded-lg p-2 mb-1 border-l-4 border-purple-400`;

                    const gradeClass = isHighScore ? 'bg-amber-500 text-white' : 'bg-gray-200 text-gray-700';

                    studentEl.innerHTML = `
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="font-medium">${student.name}</span>
                                        <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full ml-2">ID: ${student.id}</span>
                                    </div>
                                    <span class="${gradeClass} text-xs px-2 py-1 rounded-full font-bold">${student.grade}</span>
                                </div>
                            `;
                    groupContainer.appendChild(studentEl);

                    // Remove this student from the main list to avoid duplication
                    classObj.students = classObj.students.filter(s => s.id !== student.id);
                }

                classElement.appendChild(groupContainer);
            }

            // Display remaining ungrouped students
            for (const student of classObj.students) {
                const isHighScore = student.grade > 90;

                const studentEl = document.createElement('div');
                studentEl.className = `${isHighScore ? 'bg-amber-50' : 'bg-gray-50'} border-l-4 border-indigo-400 rounded-lg p-3 mb-2`;

                const gradeClass = isHighScore ? 'bg-amber-500 text-white' : 'bg-gray-200 text-gray-700';

                studentEl.innerHTML = `
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="font-medium">${student.name}</span>
                                    <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full ml-2">ID: ${student.id}</span>
                                </div>
                                <span class="${gradeClass} text-xs px-2 py-1 rounded-full font-bold">${student.grade}</span>
                            </div>
                        `;
                classElement.appendChild(studentEl);
            }
        }
    }

    // Helper function to assign a student to a class
    function assignStudentToClass(student, classObj) {
        classObj.students.push(student);

        // Update the first name count
        const firstName = student.name.split(' ')[0];
        if (!classObj.firstNames[firstName]) {
            classObj.firstNames[firstName] = 1;
        } else {
            classObj.firstNames[firstName]++;
        }

        // Update high scorer flag
        if (student.grade > 90) {
            classObj.hasHighScorer = true;
        }
    }
});