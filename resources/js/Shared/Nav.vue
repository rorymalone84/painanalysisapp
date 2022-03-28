<template>
  <nav>
    <ul class="flex space-x-6">
      <!-- Admin Links -->
      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/dashboard"
          :active="$page.component === 'Admin/Dashboard'"
        >
          Dashboard
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/patientsList"
          :active="$page.component === 'Admin/PatientsList'"
        >
          Patients
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/doctorsList"
          :active="$page.component === 'Admin/DoctorsList'"
        >
          Doctors
        </NavLink>
      </li>
      <!-- end of Admin specific links -->

      <li>
        <NavLink href="/settings" :active="$page.component === 'Settings'">
          Settings
        </NavLink>
      </li>

      <li>
        <NavLink href="/logout" method="post"> Logout </NavLink>
      </li>

      <h1>{{ pr }}</h1>
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink },
};
</script>