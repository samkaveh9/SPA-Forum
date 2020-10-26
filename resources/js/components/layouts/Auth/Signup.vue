<template>
    <v-card class="mx-auto my-auto rounded-xl" max-width="600" elevation="16">
        <v-container>
            <validation-observer ref="observer">
                <v-card-title primary-title>
                    Signup
                </v-card-title>
                <v-form @submit.prevent="signup" class="pa-5">
                    <validation-provider
                        v-slot="{ errors }"
                        name="Name"
                        rules="required|max:25"
                        class="text-sm-right"
                    >
                        <v-text-field
                            v-model="form.name"
                            :counter="25"
                            :error-messages="errors"
                            label="Name"
                            type="text"
                            class="text-sm-right"
                            required
                        ></v-text-field>
                    </validation-provider>

                    <validation-provider
                        v-slot="{ errors }"
                        name="Email"
                        rules="required|max:25|email"
                        class="text-sm-right"
                    >
                        <v-text-field
                            v-model="form.email"
                            :counter="25"
                            :error-messages="errors"
                            label="Email"
                            type="email"
                            class="text-sm-right"
                            required
                        ></v-text-field>
                    </validation-provider>
                    <validation-provider
                        v-slot="{ errors }"
                        name="Password"
                        rules="required|password"
                    >
                        <v-text-field
                            v-model="form.password"
                            :error-messages="errors"
                            label="Password"
                            type="password"
                            required
                        ></v-text-field>
                    </validation-provider>

                    <validation-provider
                        v-slot="{ errors }"
                        name="Password Confirmation"
                        rules="required|password"
                    >
                        <v-text-field
                            v-model="form.password_confirmation"
                            :error-messages="errors"
                            label="Password Confirmation"
                            type="password"
                            required
                        ></v-text-field>
                    </validation-provider>

                    <v-flex>
                        <v-btn
                            class="mt-3 ml-3 indigo white--text"
                            type="submit"
                        >
                            Signup
                        </v-btn>
                        <v-btn class="mt-3 ml-3 info">
                            <router-link
                                class="white--text text-decoration-none"
                                :to="{ name: 'login' }"
                                >Login</router-link
                            >
                        </v-btn>
                    </v-flex>
                </v-form>
            </validation-observer>
        </v-container>
    </v-card>
</template>

<script>
import { required, email, max } from "vee-validate/dist/rules";
import {
    extend,
    ValidationObserver,
    ValidationProvider,
    setInteractionMode
} from "vee-validate";

setInteractionMode("eager");

extend("required", {
    ...required,
    message: "{_field_} can not be empty"
});

extend("max", {
    ...max,
    message: "{_field_} may not be greater than {length} characters"
});

extend("email", {
    ...email,
    message: "Email must be valid"
});

export default {
    components: {
        ValidationProvider,
        ValidationObserver
    },

    data() {
        return {
            form: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },
            errors: {}
        };
    },
    created() {
        if (User.loggedIn()) {
            this.$router.push({ name: "forum" });
        }
    },
    methods: {
        signup() {
            axios
                .post("/api/auth/signup", this.form)
                .then(res => {
                    User.responseAfterLogin(res);
                    this.$router.push({ name: "forum" });
                })
                .catch(error => (this.errors = error.response.data.errors));
        }
    }
};
</script>
