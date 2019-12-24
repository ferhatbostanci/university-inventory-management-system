<template>
  <CContainer class="d-flex align-items-center min-vh-100">
    <CRow class="justify-content-center">
      <CCol md="8">
        <CCardGroup>
          <CCard class="p-4">
            <CCardBody>
              <CForm @submit.prevent="login">
                <h1>Giriş</h1>
                <p class="text-muted">Hesabınıza giriş yapın</p>
                <CInput v-model="email" placeholder="E-Posta">
                  <template #prepend-content><CIcon name="cil-user"/></template>
                </CInput>
                <CInput v-model="password" type="password" placeholder="Parola">
                  <template #prepend-content><CIcon name="cil-lock-locked"/></template>
                </CInput>
                <CRow>
                  <CCol col="6">
                    <CButton type="submit" color="primary" class="px-4">Giriş Yap</CButton>
                  </CCol>
                  <CCol col="6" class="text-right">
                    <CButton color="link" class="px-0">Parolamı unuttum?</CButton>
                  </CCol>
                </CRow>
              </CForm>
            </CCardBody>
          </CCard>
          <CCard
            color="primary"
            text-color="white"
            class="text-center py-5 d-md-down-none"
            style="width:44%"
            body-wrapper
          >
            <CCardBody>
              <h2>UIMS</h2>
              <p>Üniversite Envanter Yönetim Sistemi ile demirbaşları, zimmetleri ve daha fazlasını kolayca yönetebilirsin</p>
            </CCardBody>
          </CCard>
        </CCardGroup>
      </CCol>
    </CRow>
  </CContainer>
</template>

<script>
export default {
  name: 'Login',
  data(){
    return {
      email : "",
      password : ""
    }
  },
  beforeCreate: function () {
    if (this.$store.getters.isLoggedIn) {
      this.$router.push('/');
    }
  },
  methods: {
    login: function () {
      let email = this.email;
      let password = this.password;
      this.$store.dispatch('login', {'email': email, 'password': password}).then(() => {
        this.$router.push('/');
      })
    }
  }
}
</script>
