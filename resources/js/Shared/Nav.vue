<template>
  <nav class="">
    <ul class="invisible lg:visible flex sticky">
      <!-- Admin Links -->
      <li v-if="$page.props.auth.user.role_id === 3" class="pr-4">
        <NavLink
          href="/admin/dashboard"
          :active="$page.component === 'Admin/Dashboard'"
        >
          Dashboard
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3" class="pr-4">
        <NavLink
          href="/admin/patientsList"
          :active="$page.component === 'Admin/PatientsList'"
        >
          Patients
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3" class="pr-4">
        <NavLink
          href="/admin/doctorsList"
          :active="$page.component === 'Admin/DoctorsList'"
        >
          Doctors
        </NavLink>
      </li>
      <!-- end of Admin specific links -->

      <!-- patient links -->
      <li v-if="$page.props.auth.user.role_id === 1" class="pr-4">
        <NavLink
          href="/patients/home"
          :active="$page.component === 'Patients/Dashboard'"
        >
          Home
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1" class="pr-4">
        <NavLink
          href="/patients/form"
          :active="$page.component === 'PainAnalysis/Form'"
        >
          Form
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1" class="pr-4">
        <NavLink
          href="/patients/journal"
          :active="$page.component === 'Patients/Journal'"
        >
          Journal
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1" class="pr-4">
        <NavLink
          href="/patients/consultMenu"
          :active="$page.component === 'Patients/ConsultMenu'"
        >
          Consults
        </NavLink>
      </li>

      <!-- end of patient links -->

      <!-- doctor links -->

      <li v-if="$page.props.auth.user.role_id === 2" class="pr-4">
        <NavLink
          href="/doctors/dashboard"
          :active="$page.component === 'Doctors/Dashboard'"
        >
          Dashboard
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 2" class="pr-4">
        <NavLink
          href="/doctors/consults/menu"
          :active="$page.component === 'Doctors/ConsultMenu'"
        >
          Consults
        </NavLink>
      </li>

      <!-- end of doctor links -->

      <li>
        <NavLink href="/logout" method="post"> Logout </NavLink>
      </li>
    </ul>

    <!-- mobile menu -->
    <ul
      :class="showMenu ? 'flex' : 'hidden'"
      class="
        p-10
        flex-col
        mt-8
        space-y-4
        fixed
        bg-blue-100
        top-5
        left-0
        right-0
        z-10
        md:hidden
      "
    >
      <!-- Admin Links -->
      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/dashboard"
          :active="$page.component === 'Admin/Dashboard'"
          @click="showMenu = !showMenu"
        >
          Dashboard
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/patientsList"
          :active="$page.component === 'Admin/PatientsList'"
          @click="showMenu = !showMenu"
        >
          Patients
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 3">
        <NavLink
          href="/admin/doctorsList"
          :active="$page.component === 'Admin/DoctorsList'"
          @click="showMenu = !showMenu"
        >
          Doctors
        </NavLink>
      </li>
      <!-- end of Admin specific links -->

      <!-- doctor links -->

      <li v-if="$page.props.auth.user.role_id === 2" class="pr-4">
        <NavLink
          href="/doctors/dashboard"
          :active="$page.component === 'Doctors/Dashboard'"
          @click="showMenu = !showMenu"
        >
          Dashboard
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 2" class="pr-4">
        <NavLink
          href="/doctors/consults/menu"
          :active="$page.component === 'Doctors/ConsultMenu'"
          @click="showMenu = !showMenu"
        >
          Consults
        </NavLink>
      </li>

      <!-- end of doctor links -->

      <!-- patient links -->
      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/home"
          :active="$page.component === 'Patients/Dashboard'"
          @click="showMenu = !showMenu"
        >
          Home
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/form"
          :active="$page.component === 'PainAnalysis/Form'"
          @click="showMenu = !showMenu"
        >
          Form
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/journal"
          :active="$page.component === 'Patients/Journal'"
          @click="showMenu = !showMenu"
        >
          Journal
        </NavLink>
      </li>

      <li v-if="$page.props.auth.user.role_id === 1">
        <NavLink
          href="/patients/consultMenu"
          :active="$page.component === 'Patients/ConsultMenu'"
          @click="showMenu = !showMenu"
        >
          Consults
        </NavLink>
      </li>

      <!-- end of patient links -->

      <li>
        <NavLink href="/logout" method="post"> Logout </NavLink>
      </li>
    </ul>

    <!-- mobile menu button-->
    <div @click="showMenu = !showMenu" class="md:hidden absolute top-6 right-6">
      <button
        type="button"
        class="
          text-gray-800
          hover:text-gray-400
          focus:outline-none focus:text-gray-400
        "
      >
        <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
          <path
            fill-rule="evenodd"
            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
          ></path>
        </svg>
      </button>
    </div>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink },

  data() {
    return {
      showMenu: false,
    };
  },
};
</script>

