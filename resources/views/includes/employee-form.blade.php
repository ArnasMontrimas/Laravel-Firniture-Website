<div class="form-employee-general">
    <header>
        <h3>General Information</h3>
    </header>
    <div class="form-employeeName">
        <label for="employeeName">Name</label>
        <input type="text" id="employeeName" name="employeeName" placeholder="Name.." required>
    </div>
    <div class="form-employeeSurname">
        <label for="employeeSurname">Surname</label>
        <input type="text" id="employeeSurname" name="employeeSurname" placeholder="Surname..." required>
    </div>
    <div class="form-employeeEmail">
        <label for="employeeEmail">Email</label>
        <input type="email" id="employeeEmail" name="employeeEmail" placeholder="Email.." required>
    </div>
    <div class="form-employeePassword">
        <label for="employeePassword">Password</label>
        <input type="password" id="employeePassword" name="employeePassword" placeholder="Password..." required>
    </div>
    <div class="form-employeeType">
        <label for="employeeType">Type</label>
        <select name="types" id="employeeType">
            <option value="admin">Admin</option>
            <option value="supervisor">Supervisor</option>
            <option value="production">Production</option>
        </select>
    </div>
    <div class="form-employeeSalary">
        <label for="employeeSalary">Salary</label>
        <input type="number"  id="employeeSalary" min="0" step=".01" name="employeeSalary" placeholder="Salary..." required>
    </div>
</div>
<div class="form-employee-address">
    <header>
        <h3>Address Information</h3>
    </header>
    <div class="form-employeeCity">
        <label for="employeeCity">City</label>
        <input type="text" id="employeeCity" name="employeeCity" placeholder="City..." required>
    </div>
    <div class="form-employeeStreet">
        <label for="employeeStreet">Street</label>
        <input type="text" id="employeeStreet" name="employeeStreet" placeholder="Street..." required>
    </div>
    <div class="form-employeePostcode">
        <label for="employeePostcode">Post Code</label>
        <input type="text" id="employeePostcode" name="employeePostcode" placeholder="Post Code..." required>
    </div>
</div>