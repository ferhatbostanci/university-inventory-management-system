<template>
  <CDropdown
    inNav
    class="c-header-nav-items"
    placement="bottom-end"
    add-menu-classes="pt-0"
  >
    <template #toggler>
      <CHeaderNavLink>
        <div class="c-avatar">
          <img
            src="https://static1.tothenew.com/blog/wp-content/uploads/2014/12/golang.jpg"
            class="c-avatar-img "
          />
        </div>
      </CHeaderNavLink>
    </template>
    <CDropdownHeader
      tag="div"
      class="text-center"
      color="light"
    >
      <strong>Settings</strong>
    </CDropdownHeader>
    <CDropdownItem>
      <CIcon name="cil-user" /> Profil
    </CDropdownItem>
    <CDropdownItem>
      <CIcon name="cil-settings" /> Ayarlar
    </CDropdownItem>
    <CDropdownItem>
      <CIcon name="cil-layers" /> Envanterim
      <CBadge color="primary" class="ml-auto">{{ itemsCount }}</CBadge>
    </CDropdownItem>
    <CDropdownDivider/>
    <CDropdownItem>
      <CIcon name="cil-shield-alt" /> Hesabı Kilitle
    </CDropdownItem>
    <CDropdownItem v-on:click="$store.dispatch('logout').then(() => {$router.push('users/login')})">
      <CIcon name="cil-lock-locked" /> Çıkış Yap
    </CDropdownItem>
  </CDropdown>
</template>

<script>
export default {
  name: 'TheHeaderDropdownAccnt',
  data () {
    return { 
      itemsCount: 0
    }
  }
}
</script>

<style scoped>
  .c-icon {
    margin-right: 0.3rem;
  }
</style>