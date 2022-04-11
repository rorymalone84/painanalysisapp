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

      <!-- patient links -->
      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/home"
          :active="$page.component === 'Patients/Dashboard'"
        >
          Home
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/form"
          :active="$page.component === 'PainAnalysis/Form'"
        >
          Form
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/journal"
          :active="$page.component === 'Patients/Journal'"
        >
          Journal
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/consults"
          :active="$page.component === 'Patients/Consults'"
        >
          Consults
        </NavLink>
      </li>

      <!-- end of patient links -->

      <li>
        <NavLink href="/logout" method="post"> Logout </NavLink>
      </li>
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink },
};
</script>