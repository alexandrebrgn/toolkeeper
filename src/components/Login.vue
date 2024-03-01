<template>
<!--  <div class="col-md-12">-->
<!--    <div class="card card-container">-->
<!--      <img-->
<!--          id="profile-img"-->
<!--          src="//ssl.gstatic.com/accounts/ui/avatar_2x.png"-->
<!--          class="profile-img-card"-->
<!--      />-->

<!--      <Form @submit="handleLogin" :validation-schema="schema">-->

<!--        &lt;!&ndash; Email &ndash;&gt;-->

<!--        <div class="form-group">-->
<!--          <label for="email">Username</label>-->
<!--          <Field name="email" type="text" class="form-control" />-->
<!--          <ErrorMessage name="email" class="error-feedback" />-->
<!--        </div>-->

<!--        &lt;!&ndash; Mot de passe &ndash;&gt;-->

<!--        <div class="form-group">-->
<!--          <label for="password">Password</label>-->
<!--          <Field name="password" type="password" class="form-control" />-->
<!--          <ErrorMessage name="password" class="error-feedback" />-->
<!--        </div>-->

<!--        &lt;!&ndash; Bouton de validation &ndash;&gt;-->

<!--        <div class="form-group">-->
<!--          <button class="btn btn-primary btn-block" :disabled="loading">-->
<!--            <span-->
<!--                v-show="loading"-->
<!--                class="spinner-border spinner-border-sm"-->
<!--            ></span>-->
<!--            <span>Login</span>-->
<!--          </button>-->
<!--        </div>-->

<!--        &lt;!&ndash; Message à afficher &ndash;&gt;-->

<!--        <div class="form-group">-->
<!--          <div v-if="message" class="alert alert-danger" role="alert">-->
<!--            {{ message }}-->
<!--          </div>-->
<!--        </div>-->
<!--      </Form>-->

<!--    </div>-->
<!--  </div>-->
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="../../public/operator1.jpg"
                     alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <Form @submit="handleLogin" :validation-schema="schema">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Logo - Toolkeeper</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez-vous</h5>

                    <div class="form-outline mb-4 form-group">
                      <label for="email" class="form-label">Adresse email</label>
                      <Field name="email" id="email" type="text" class="form-control form-control-lg" />
                      <ErrorMessage name="email" class="error-feedback" />
                    </div>

<!--                    <div class="form-outline mb-4">-->
<!--                      <input type="email" id="form2Example17" class="form-control form-control-lg" />-->
<!--                      <label class="form-label" for="form2Example17">Adresse email</label>-->
<!--                    </div>-->

                    <div class="form-group form-outline mb-4">
                      <label for="password">Mot de passe</label>
                      <Field name="password" type="password" class="form-control form-control-lg" />
                      <ErrorMessage name="password" class="error-feedback" />
                    </div>

<!--                    <div class="form-outline mb-4">-->
<!--                      <input type="password" id="form2Example27" class="form-control form-control-lg" />-->
<!--                      <label class="form-label" for="form2Example27">Mot de passe</label>-->
<!--                    </div>-->

                    <div class="form-group pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" :disabled="loading">
                      <span
                          v-show="loading"
                          class="spinner-border spinner-border-sm"
                      ></span>
                        <span>Se connecter</span>
                      </button>
                    </div>

<!--                    <div class="pt-1 mb-4">-->
<!--                      <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>-->
<!--                    </div>-->

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                                                                                              style="color: #393f81;">Register here</a></p>
                  </Form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style>
.error-feedback {
  color: rgba(255, 0, 0, 0.93);
}
</style>

<script>
import { Form, Field, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
  name: "Login",
  components: {
    Form,
    Field,
    ErrorMessage,
  },
  data() {
    const schema = yup.object().shape({
      email: yup.string().required("Email is required!"),
      password: yup.string().required("Password is required!"),
    });

    return {
      loading: false,
      message: "",
      schema,
    };
  },
  computed: {
    loggedIn() {
      return this.$store.state.auth.status.loggedIn;
    },
  },
  created() {
    if (this.loggedIn) {
      this.$router.push("/profile");
    }
  },
  methods: {
    handleLogin(user) {
      this.loading = true;

      this.$store.dispatch("auth/login", user).then(
          () => {
            this.$router.push("/home");
          },
          (error) => {
            console.log('LoginVue - HandleLogin - error')
            this.loading = false;
            this.message =
                (error.response &&
                    error.response.data &&
                    error.response.data.message) ||
                error.message ||
                error.toString();
          }
      );
    },
  },
};
</script>

<style scoped>
</style>