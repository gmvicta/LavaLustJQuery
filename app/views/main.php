<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LavaLust JQuery</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#015c2b',
            secondary: '#10B981',
          }
        }
      }
    }
  </script>
  <style>
    .dataTables_wrapper {
      background: white;
      border-radius: 1rem;
      box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
      padding: 2rem;
    }

    .dataTables_filter input {
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      border: 2px solid #e2e8f0;
    }

    .dataTables_length select {
      padding: 0.5rem 2rem 0.5rem 1rem;
      border-radius: 0.5rem;
      border: 2px solid #e2e8f0;
    }

    .dataTables_paginate .paginate_button {
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      margin: 0 0.25rem;
    }

    .dataTables_paginate .paginate_button.current {
      background-color: #4F46E5;
      color: white !important;
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen">
  <!-- Header -->
  <header class="bg-primary text-white shadow-lg py-6 px-8">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-bold">Main Menu</h1>
      <button onclick="openAddUserModal()" class="bg-secondary hover:bg-green-600 text-white px-6 py-3 rounded-lg shadow-md transition-colors text-lg font-semibold flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Create User 
      </button>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container mx-auto px-8 py-12">
    <div class="bg-white shadow-2xl rounded-2xl p-10">
      <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Users Table</h2>
      </div>
      <table id="userTable" class="w-full">
        <thead>
          <tr class="text-left text-gray-600 text-lg">
            <th class="px-6 py-4 font-semibold">First Name</th>
            <th class="px-6 py-4 font-semibold">Last Name</th>
            <th class="px-6 py-4 font-semibold">Email</th>
            <th class="px-6 py-4 font-semibold">Gender</th>
            <th class="px-6 py-4 font-semibold">Address</th>
            <th class="px-6 py-4 font-semibold">Action</th>
          </tr>
        </thead>
        <tbody class="text-gray-700">
        </tbody>
      </table>
    </div>
  </main>

  <!-- Delete Modal -->
  <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-md w-full mx-4">
      <h3 class="text-2xl font-bold text-gray-800 mb-4">Confirm Delete</h3>
      <p class="text-gray-600 mb-8 text-lg">Confirm Deletion?</p>
      <div class="flex justify-end gap-4">
        <button onclick="closeModal()" class="px-6 py-3 text-lg font-semibold text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 transition-colors">
          Cancel
        </button>
        <button id="confirmDeleteBtn" class="px-6 py-3 text-lg font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 transition-colors">
          Delete
        </button>
      </div>
    </div>
  </div>

  <!-- Add User Modal -->
  <div id="addUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-lg w-full mx-4">
      <h3 class="text-2xl font-bold text-gray-800 mb-4">Create New User</h3>
      <form id="addUserForm" class="space-y-6">
        <div>
          <label for="add_last_name" class="block text-lg font-medium text-gray-700 mb-2">Last Name</label>
          <input type="text" id="add_last_name" name="gmv_last_name" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="add_first_name" class="block text-lg font-medium text-gray-700 mb-2">First Name</label>
          <input type="text" id="add_first_name" name="gmv_first_name" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="add_email" class="block text-lg font-medium text-gray-700 mb-2">Email</label>
          <input type="email" id="add_email" name="gmv_email" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="add_gender" class="block text-lg font-medium text-gray-700 mb-2">Gender</label>
          <select id="add_gender" name="gmv_gender" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div>
          <label for="add_address" class="block text-lg font-medium text-gray-700 mb-2">Address</label>
          <textarea id="add_address" name="gmv_address" rows="3" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300"></textarea>
        </div>
        <div class="flex justify-end gap-4">
          <button type="button" onclick="closeAddUserModal()" class="px-6 py-3 text-lg font-semibold text-gray-700 bg-gray-200 rounded-lg">Cancel</button>
          <button type="submit" class="px-6 py-3 text-lg font-semibold text-white bg-primary rounded-lg">Create User</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div id="editUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-8 max-w-lg w-full mx-4">
      <h3 class="text-2xl font-bold text-gray-800 mb-4">Update User</h3>
      <form id="editUserForm" class="space-y-6">
        <input type="hidden" id="edit_user_id">
        <div>
          <label for="edit_last_name" class="block text-lg font-medium text-gray-700 mb-2">Last Name</label>
          <input type="text" id="edit_last_name" name="gmv_last_name" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="edit_first_name" class="block text-lg font-medium text-gray-700 mb-2">First Name</label>
          <input type="text" id="edit_first_name" name="gmv_first_name" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="edit_email" class="block text-lg font-medium text-gray-700 mb-2">Email</label>
          <input type="email" id="edit_email" name="gmv_email" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
        </div>
        <div>
          <label for="edit_gender" class="block text-lg font-medium text-gray-700 mb-2">Gender</label>
          <select id="edit_gender" name="gmv_gender" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
        </div>
        <div>
          <label for="edit_address" class="block text-lg font-medium text-gray-700 mb-2">Address</label>
          <textarea id="edit_address" name="gmv_address" rows="3" required class="w-full px-4 py-3 rounded-lg border-2 border-gray-300"></textarea>
        </div>
        <div class="flex justify-end gap-4">
          <button type="button" onclick="closeEditUserModal()" class="px-6 py-3 text-lg font-semibold text-gray-700 bg-gray-200 rounded-lg">Cancel</button>
          <button type="submit" class="px-6 py-3 text-lg font-semibold text-white bg-primary rounded-lg">Save Changes</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Define fetchUsers function in the global scope
    function fetchUsers() {
      $.ajax({
        url: '/user/get_all',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
          const dataTable = $('#userTable').DataTable();
          dataTable.clear();
          if (data.users && data.users.length > 0) {
            data.users.forEach(user => {
              dataTable.row.add([
                user.gmv_first_name,
                user.gmv_last_name,
                user.gmv_email,
                user.gmv_gender,
                user.gmv_address,
                user.id
              ]);
            });
          } else {
            dataTable.row.add(['No users found', '', '', '', '', '']);
          }
          dataTable.draw();
        },
        error: function() {
          alert('Failed to fetch users.');
        }
      });
    }
    $(document).ready(function() {
      const dataTable = $('#userTable').DataTable({
        dom: '<"flex flex-col md:flex-row justify-between items-center mb-6"f<"flex items-center gap-4"l<"text-gray-500"i>>>rt<"flex flex-col md:flex-row justify-between items-center mt-6"p>',
        language: {
          search: "",
          searchPlaceholder: "Search users...",
          lengthMenu: "Show _MENU_",
        },
        pageLength: 10,
        columnDefs: [{
          targets: -1,
          orderable: false,
          render: function(data, type, row) {
            return `
                <div class="flex gap-4">
                    <button onclick="openEditUserModal('${row[5]}')" class="text-primary hover:text-indigo-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                    </button>

                    <button onclick="openModal('${row[5]}')" class="text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            `;
          }
        }]
      });

      fetchUsers();

      let userIdToDelete = null;

      window.openModal = function(userId) {
        userIdToDelete = userId;
        $('#deleteModal').removeClass('hidden');
      };

      window.closeModal = function() {
        $('#deleteModal').addClass('hidden');
        userIdToDelete = null;
      };

      $('#confirmDeleteBtn').click(function() {
        if (userIdToDelete) {
          $.ajax({
            url: '/user/delete/' + userIdToDelete,
            type: 'GET',
            success: function() {
              closeModal();
              fetchUsers();
            },
            error: function() {
              alert('Failed to delete user.');
            }
          });
        }
      });
    });
  </script>

  <script>
    //=== MODAL ===//
    function openAddUserModal() {
      $('#addUserModal').removeClass('hidden');
    }

    function openEditUserModal(userId) {
      $.ajax({
        url: '/user/edit/' + userId,
        type: 'GET',
        success: function(response) {
          if (response.status === 'success') {
            const user = response.user;
            $('#edit_last_name').val(user.gmv_last_name);
            $('#edit_first_name').val(user.gmv_first_name);
            $('#edit_email').val(user.gmv_email);
            $('#edit_gender').val(user.gmv_gender);
            $('#edit_address').val(user.gmv_address);
            $('#editUserModal').data('userId', userId);
            $('#editUserModal').removeClass('hidden');
          } else {
            alert(response.message || 'Failed to fetch user data.');
          }
        },
        error: function() {
          alert('Failed to fetch user data.');
        },
      });
    }

    $('#addUserForm').on('submit', function(e) {
      e.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: '/user/create',
        type: 'POST',
        data: formData,
        success: function() {
          $('#addUserModal').addClass('hidden');
          fetchUsers();
        },
        error: function() {
          alert('Failed to add user.');
        }
      });
    });

    $('#editUserForm').on('submit', function(e) {
      e.preventDefault();

      var formData = $(this).serialize();
      var userId = $('#editUserModal').data('userId');

      $.ajax({
        url: '/user/update/' + userId,
        type: 'POST',
        data: formData,
        success: function(response) {
          $('#editUserModal').addClass('hidden');
          fetchUsers();
        },
        error: function(xhr, status, error) {
          console.error('AJAX Error:', status, error);
          alert('Failed to update user.');
        }
      });
    });

    function closeAddUserModal() {
      const modal = document.getElementById('addUserModal');
      modal.classList.add('hidden');
    }

    function closeEditUserModal() {
      const modal = document.getElementById('editUserModal');
      modal.classList.add('hidden');
    }

    window.addEventListener('click', function(event) {
      if (event.target === document.getElementById('addUserModal')) {
        closeAddUserModal();
      }
      if (event.target === document.getElementById('editUserModal')) {
        closeEditUserModal();
      }
    });
  </script>
</body>

</html>