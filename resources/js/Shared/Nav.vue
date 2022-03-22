<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink href="/" :active="$page.component === 'Home'"> Home </NavLink>
      </li>

      <!-- Admin Links -->
      <li v-if="$page.props.auth.user.role === 1">
        <NavLink
          href="/admin/patientsList"
          :active="$page.component === 'Admin/PatientsList'"
        >
          Patients
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role === 1">
        <NavLink
          href="/admin/doctorsList"
          :active="$page.component === 'Admin/DoctorsList'"
        >
          Doctors
        </NavLink>
      </li>

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
  computed: {
    name() {
      return this.$page.props.auth.user.name;
    },
  },
};
</script>