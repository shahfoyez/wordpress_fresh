<style>
    .login {
        background: #16222a;
        background: linear-gradient(90deg, #16222a 0, #3a6073);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#16222a", endColorstr="#3a6073", GradientType=1);
        min-height: calc(100vh - 50px);
    }

    .login.reset-login {
        padding-top: 1px;
    }

    .login.reset-login .login-container {
        margin: 35px auto 150px;
    }

    .login.reset-login .login-container .tab {
        background: 0 0;
    }

    .login.reset-login .login-container .tab .login-left h3 {
        font-size: 40px;
        line-height: 50px;
    }

    @media (max-width: 480px) {
        .login.reset-login .login-container .tab .login-left h3 {
            font-size: 30px;
            line-height: 40px;
        }
    }

    .login.reset-login .login-container .tab .login-right .tab-content {
        margin: 0 auto;
        position: relative;
        width: 93%;
    }

    .login.reset-login .login-container .form-group {
        background: #fff;
        min-height: 320px;
        padding: 20px;
    }

    @media (max-width: 768px) {
        .login {
            padding-top: 59px;
        }
    }

    @media (min-width: 768px) {
        .footerless-login {
            min-height: 100vh;
            padding-top: 60px;
        }

        .footerless-login .login-container ul.tab-content {
            position: static;
        }
    }

    .login-container {
        margin: 100px auto 150px;
        max-width: 950px;
    }

    @media (max-width: 1366px) {
        .login-container {
            margin: 20px auto 150px;
        }
    }

    .login-container #login,
    .login-container #signup {
        background: url(/html/site/img/homepage/login-bg.png) repeat top/100% auto;
    }

    .login-container #signup {
        color: #fff;
        overflow: hidden;
        position: relative;
    }

    .login-container #signup .form-group .input-field,
    .login-container #signup .form-group .input-field-email {
        margin-top: 11px;
    }

    .login-container #login .form-group {
        padding-top: 31px;
    }

    .login-container #login .form-group .half-width.check {
        margin: 12px 0 10px;
    }

    @media (max-width: 653px) {
        .login-container #login .form-group .half-width.check {
            margin: 20px 0 10px;
        }
    }

    @media (max-width: 768px) {
        .login-container #login .form-group {
            padding-top: 51px;
        }
    }

    .login-container .tabs {
        background: 0 0;
        float: right;
        max-width: 50%;
        width: 100%;
    }

    .login-container .tabs:after {
        clear: both;
        content: "";
        display: table;
    }

    .login-container .tabs>div {
        background: #eaeff4;
        border-top-left-radius: 12px;
        border-top-right-radius: 12px;
        box-shadow: none;
        color: #5d676e;
        cursor: pointer;
        float: left;
        text-align: center;
        width: 204px;
    }

    .login-container .tabs>div.active,
    .login-container .tabs>div:hover {
        background: #fff;
    }

    .login-container .tabs>div.active a,
    .login-container .tabs>div:hover a {
        color: #83c11f;
        font-weight: 500;
    }

    .login-container .tabs>div:hover {
        background: #f6f8fa;
    }

    .login-container .tabs>div.active {
        background: #fff;
        box-shadow: 0 -3px 6px rgba(210, 216, 222, 0.39);
    }

    .login-container .tabs>div a {
        color: #5d676e;
        display: block;
        padding: 11px 0 10px;
        transition: background 0.3s ease-in;
    }

    @media (max-width: 653px) {
        .login-container .tabs>div {
            width: 50%;
        }
    }

    .login-container #forgotpassword .form-group {
        min-height: 425px;
    }

    .login-container #forgotpassword .form-group .input-field {
        margin-bottom: 30px;
    }

    .login-container #forgotpassword .login-right {
        background: 0 0;
    }

    .login-container #forgotpassword .signup-account a {
        background: #15212a;
        bottom: 0;
        color: #83c11f;
        left: 0;
        padding: 15px 10px;
        position: absolute;
        width: 100%;
    }

    .login-container #forgotpassword .signup-account a span {
        margin-right: 10px;
        position: relative;
        top: 2px;
    }

    .login-container [type="checkbox"]:checked+label:after {
        background: #83c11f;
    }

    .login-container .form-checkbox {
        color: #868d92;
        position: relative;
    }

    .login-container label {
        font: 400 0.875em Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;
    }

    .login-container .half-width {
        display: inline-block;
        margin-right: -5px;
        text-align: left;
        width: 50%;
    }

    .login-container .half-width .form-link[data-name*="forgotpassword"] {
        font: 500 0.75em Roboto, Helvetica Neue, Helvetica, Arial, sans-serif;
        text-align: right;
    }

    .login-container .half-width .form-link[data-name*="forgotpassword"] a {
        color: #83c11f;
    }

    .login-container .tab {
        background: #15212a;
        display: none;
    }

    .login-container .tab:after {
        clear: both;
        content: "";
        display: table;
    }

    .login-container .tab#signup .login-right {
        min-height: 500px;
    }

    .login-container .tab.active {
        display: list-item;
    }

    .login-container .tab h1,
    .login-container .tab h3 {
        color: #fff;
        font-size: 45px;
        font-weight: 500;
        padding-top: 70px;
    }

    .login-container .tab h4 {
        color: #83c11f;
        font-size: 17px;
        margin: 15px 0 10px;
    }

    .login-container .tab span.login-title {
        margin-bottom: 10px;
    }

    .login-container .tab .login-left {
        padding: 20px;
        position: relative;
        text-align: center;
    }

    .login-container .tab .login-left p {
        color: #fff;
        font-size: 16px;
        letter-spacing: 0.32px;
        margin-bottom: 15px;
    }

    .login-container .tab .login-left p a {
        color: #fff;
        letter-spacing: 0.32px;
    }

    .login-container .tab .login-left p a.green {
        color: #fff !important;
    }

    .login-container .tab .login-left .icon-lightbulb {
        color: #fff;
        font-size: 130px;
    }

    @media (max-width: 653px) {
        .login-container .tab .login-left {
            padding-top: 18px;
        }
    }

    .login-container .tab .login-right {
        background: 0 0;
        overflow: hidden;
        padding-top: 0;
        position: relative;
    }

    .login-container .tab .icon-rocket {
        bottom: 0;
        color: #fff;
        font-size: 141px;
        left: 0;
        position: absolute;
    }

    .login-container .tab .icon-rocket.mobile-rocket {
        display: none;
    }

    .login-container .tab .or-line {
        background: 29px;
        background: #eaeff4;
        height: calc(100% - 37px);
        opacity: 0.8;
        position: absolute;
        right: 0;
        text-align: center;
        top: 37px;
        width: 2px;
    }

    .login-container .tab .or-line span {
        background: #fff;
        border: 2px solid #eaeff4;
        border-radius: 100%;
        color: #b3bdc0;
        display: block;
        font-size: 16px;
        left: 50%;
        padding: 9px 0;
        position: absolute;
        text-transform: uppercase;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 40px;
    }

    @media (max-width: 720px) {
        .login-container .tab>.icon-rocket {
            display: none;
        }

        .login-container .tab .icon-rocket.mobile-rocket {
            bottom: 0;
            display: block;
            font-size: 50px;
        }

        .login-container .tab .login-left,
        .login-container .tab .login-right {
            float: none;
            width: 100%;
        }

        .login-container .tab .login-left {
            padding-bottom: 40px;
        }

        .login-container .tab .login-left .icon-lightbulb {
            display: none;
        }

        .login-container .tab .login-left p {
            font-size: 12px;
        }

        .login-container .tab .login-right {
            padding-top: 1px;
        }

        .login-container .tab h1,
        .login-container .tab h3 {
            font-size: 26px;
            margin-bottom: 10px;
            padding-top: 0;
        }

        .login-container .tab h4 {
            margin: 15px 0;
        }
    }

    .login-container .form-group {
        padding: 20px 38px 30px;
    }

    .login-container .form-group.social-signup {
        padding: 40px;
    }

    .login-container .form-group.social-signup .terms-conditions {
        margin: 0;
    }

    .login-container .form-group.social-signup .terms-conditions .errors .icon-error {
        vertical-align: top;
    }

    .login-container .form-group #social-form input[type="submit"] {
        font-size: 18px;
        margin-top: 20px;
    }

    .login-container .form-group .name-float {
        float: left;
        width: calc(50% - 8px);
    }

    .login-container .form-group .name-float.first-name {
        margin-right: 8px;
    }

    .login-container .form-group .name-float.last-name {
        margin-left: 8px;
    }

    .login-container .form-group .switch-tab {
        color: #15212a;
        font-size: 14px;
        padding-top: 20px;
    }

    .login-container .form-group .switch-tab a {
        color: #83c11f;
    }

    .login-container .form-group .password-toggle {
        color: #b3bdc0;
        cursor: pointer;
        font-size: 20px;
        font-weight: 700;
        height: 40px;
        position: absolute;
        right: 5px;
        top: 0;
        width: 40px;
    }

    .login-container .form-group .password-toggle:before {
        position: absolute;
        right: 10px;
        top: 10px;
    }

    .login-container .form-group .password-toggle.icon-visible-green:before {
        color: #83c11f;
    }

    .login-container .form-group .icon-user.name {
        float: left;
        margin-top: 0;
        width: 50%;
    }

    .login-container .form-group .terms-conditions {
        font-size: 16px;
    }

    .login-container .form-group .terms-conditions p {
        margin-bottom: 0;
    }

    .login-container .form-group .terms-conditions p label {
        line-height: 29px;
    }

    .login-container .form-group .half-width.check,
    .login-container .form-group .terms-conditions {
        color: #868d92;
        line-height: 29px;
        margin: 12px 0 10px;
        text-align: left;
    }

    .login-container .form-group .half-width.check [type="checkbox"]:checked+label,
    .login-container .form-group .half-width.check [type="checkbox"]:not(:checked)+label,
    .login-container .form-group .terms-conditions [type="checkbox"]:checked+label,
    .login-container .form-group .terms-conditions [type="checkbox"]:not(:checked)+label {
        display: block;
        font-size: 12px;
        margin-bottom: 11px;
        padding-left: 20px;
    }

    .login-container .form-group .half-width.check [type="checkbox"]:checked+label:before,
    .login-container .form-group .half-width.check [type="checkbox"]:not(:checked)+label:before,
    .login-container .form-group .terms-conditions [type="checkbox"]:checked+label:before,
    .login-container .form-group .terms-conditions [type="checkbox"]:not(:checked)+label:before {
        border-radius: 3px;
        height: 12px;
        left: 0;
        position: absolute;
        top: 1px;
        width: 12px;
    }

    .login-container .form-group .half-width.check [type="checkbox"]:checked+label:after,
    .login-container .form-group .half-width.check [type="checkbox"]:not(:checked)+label:after,
    .login-container .form-group .terms-conditions [type="checkbox"]:checked+label:after,
    .login-container .form-group .terms-conditions [type="checkbox"]:not(:checked)+label:after {
        border-radius: 2px;
        left: 2px;
        top: 3px;
    }

    .login-container .form-group .half-width.check a,
    .login-container .form-group .terms-conditions a {
        color: #5d666d;
        font-size: 12px;
    }

    .login-container .form-group .errors {
        margin: 5px 0;
        text-align: left;
    }

    .login-container .form-group .errors .icon-error {
        font-size: 1em;
        margin-right: 5px;
    }

    .login-container .form-group .errors .error-message {
        margin: 0;
    }

    .login-container .form-group .errors.terms-error {
        line-height: 13px;
        margin-bottom: 15px;
        text-align: left;
    }

    .login-container .form-group .errors.terms-error+br {
        display: none;
    }

    .login-container .form-group input::-webkit-input-placeholder {
        color: #5d676e;
    }

    .login-container .form-group input:-moz-placeholder,
    .login-container .form-group input::-moz-placeholder {
        color: #5d676e;
        opacity: 1;
    }

    .login-container .form-group input:-ms-input-placeholder {
        color: #5d676e;
    }

    .login-container .form-group .but.but-submit,
    .login-container .form-group input[type="submit"] {
        background: #83c11f;
        border-radius: 40px;
        color: #fff;
        cursor: pointer;
        font-size: 1.125em;
        margin: 0 auto 10px;
        padding: 13px 10px;
        text-align: center;
        transition: all 0.3s ease-in-out;
        width: 100%;
    }

    .login-container .form-group .but.but-submit:hover,
    .login-container .form-group input[type="submit"]:hover {
        background: rgba(131, 193, 31, 0.8);
    }

    .login-container .form-group .input-field,
    .login-container .form-group .input-field-email {
        border-bottom: none;
        border-radius: 4px;
        margin-top: 12px;
        position: relative;
    }

    .login-container .form-group .input-field input,
    .login-container .form-group .input-field-email input {
        background: #f3f6f7;
        border-radius: 4px;
        color: #5d676e;
        font-size: 12px;
        height: 40px;
    }

    .login-container .form-group .input-field input::-moz-placeholder,
    .login-container .form-group .input-field-email input::-moz-placeholder {
        font-size: 12px;
    }

    .login-container .form-group .input-field input::placeholder,
    .login-container .form-group .input-field-email input::placeholder {
        font-size: 12px;
    }

    .login-container .form-group .input-field input:focus,
    .login-container .form-group .input-field-email input:focus {
        border-radius: 4px 4px 1px 2px;
        box-shadow: 0 2px 0 0 #83c224;
    }

    .login-container .form-group .input-field-email.has-error,
    .login-container .form-group .input-field.has-error {
        border-color: red;
    }

    .login-container .form-group .input-field-email:before,
    .login-container .form-group .input-field:before {
        color: #0091c7;
        font-size: 20px;
        left: 0;
        position: absolute;
        top: 12px;
    }

    .login-container .form-group .input-field-email.has-error input::-webkit-input-placeholder,
    .login-container .form-group .input-field.has-error input::-webkit-input-placeholder {
        color: #f4254e;
    }

    .login-container .form-group .input-field-email.has-error input:-moz-placeholder,
    .login-container .form-group .input-field-email.has-error input::-moz-placeholder,
    .login-container .form-group .input-field.has-error input:-moz-placeholder,
    .login-container .form-group .input-field.has-error input::-moz-placeholder {
        color: #f4254e;
    }

    .login-container .form-group .input-field-email.has-error input:-ms-input-placeholder,
    .login-container .form-group .input-field.has-error input:-ms-input-placeholder {
        color: #f4254e;
    }

    .login-container .icon-group {
        display: inline-block;
        margin: 0 auto;
        padding: 0 15px;
        text-align: center;
    }

    .login-container .icon-group .spacer {
        display: inline;
    }

    .login-container .icon-group .spacer:first-child a.active,
    .login-container .icon-group .spacer:first-child a:hover {
        background-color: #3b5999;
        color: #3b5999;
    }

    .login-container .icon-group .spacer:nth-child(2) a.active,
    .login-container .icon-group .spacer:nth-child(2) a:hover {
        background-color: #dd4b39;
        color: #dd4b39;
    }

    .login-container .icon-group .spacer:nth-child(3) a.active,
    .login-container .icon-group .spacer:nth-child(3) a:hover {
        background-color: #410093;
        color: #410093;
    }

    .login-container .icon-group .spacer:nth-child(4) a.active,
    .login-container .icon-group .spacer:nth-child(4) a:hover {
        background-color: #0084ff;
        color: #0084ff;
    }

    .login-container .icon-group .spacer:nth-child(5) a.active,
    .login-container .icon-group .spacer:nth-child(5) a:hover {
        background-color: #0077b5;
        color: #0077b5;
    }

    .login-container .icon-group .spacer a {
        transition: all 0.3s ease-in;
    }

    .login-container .icon-group .spacer a.active:after,
    .login-container .icon-group .spacer a:hover:after {
        background-color: #fff;
    }

    .login-container .icon-group a {
        background-color: #f3f6f7;
        border-radius: 100%;
        box-shadow: 0 0 10px 0 rgba(50, 50, 50, 0.5);
        color: #f3f6f7;
        display: block;
        float: left;
        height: 46px;
        margin: 0 2px 5px;
        opacity: 1;
        text-align: center;
        transform: perspective(1px) translateZ(0);
        transition: none;
        transition: color 0.3s ease-in;
        width: 46px;
    }

    .login-container .icon-group a:not(.google-login):after {
        background-color: #5d666d;
        border-radius: 100%;
        content: "";
        height: 80%;
        left: 10%;
        position: absolute;
        top: 10%;
        transition: color 0.3s ease-in;
        width: 80%;
    }

    .login-container .icon-group a.google-login {
        color: #5d666d;
    }

    .login-container .icon-group a.google-login.active [class*="icon"],
    .login-container .icon-group a.google-login:hover [class*="icon"] {
        color: #fff !important;
        padding: 2px !important;
    }

    .login-container .icon-group a.google-login [class*="icon"] {
        font-size: 22px;
        line-height: 39px !important;
        padding: 6px 4px 0;
    }

    .login-container .icon-group a.active {
        background-color: #3b5999;
        border: 3px solid #000;
        box-shadow: 0 3px 4px 0 rgba(50, 50, 50, 0.85);
        opacity: 1;
    }

    .login-container .icon-group a.active [class*="icon"] {
        padding: 1px 2px;
    }

    .login-container .icon-group [class*="icon"] {
        display: inline-block;
        font-size: 39px;
        margin-left: -1px;
        margin-top: -2px;
        padding: 4px;
        position: relative;
        transition: all 0.3s ease-in;
    }

    .login-container .icon-group [class*="icon"]:before {
        position: relative;
        z-index: 2;
    }

    .login-container .icon-group [class*="icon"]:after {
        background: #fff;
        bottom: 5px;
        content: "";
        height: 0;
        left: -11px;
        position: absolute;
        transition: all 0.2s ease-in;
        width: 58px;
    }

    @media only screen and (min-width: 768px) {
        .login-container .icon-group {
            padding: 0 0 15px;
        }

        .login-container .icon-group a {
            margin: 5px 16px;
        }
    }

    @media (max-width: 768px) {
        .login-container {
            margin: 0 auto 150px;
        }
    }

    @media (max-width: 720px) {
        .login-container #signup {
            overflow: visible;
        }

        .login-container .tabs {
            float: none;
            max-width: 100%;
        }

        .login-container .icon-group {
            display: block;
            margin: 0 auto;
            padding: 0;
            text-align: center;
            width: 90%;
        }

        .login-container .icon-group .spacer {
            display: block;
            float: left;
            width: 20%;
        }

        .login-container .icon-group .spacer a {
            float: none;
            margin: 10px auto 30px;
        }
    }

    .login-modal {
        background: rgba(0, 0, 0, 0.6);
        display: none;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 9999999999;
    }

    .login-modal .back-home-inner {
        background: #15212a;
        color: #83c11f;
        padding: 15px 10px;
        text-align: center;
        width: 100%;
    }

    .login-modal .back-home-inner span {
        margin-right: 10px;
        position: relative;
        top: 2px;
    }

    .login-modal .close-modal {
        cursor: pointer;
        font-size: 1.25em;
        position: absolute;
        right: 16px;
        top: 8px;
        z-index: 9;
    }

    .login-modal .close-modal span {
        color: #fff;
    }

    @media (max-width: 653px) {
        .login-modal .close-modal {
            font-size: 22px !important;
        }
    }

    @media (max-width: 720px) {
        .login-modal {
            position: absolute;
        }
    }

    .modal-outer.topic-modal .login-modal {
        overflow-x: hidden;
        overflow-y: scroll;
        position: fixed;
    }

    .login-modal {
        position: absolute;
    }

    #login,
    #signup {
        overflow: visible;
        position: relative;
    }

    .icon-group {
        display: inline-block;
        margin: 0 auto;
        padding: 0;
        text-align: center;
        width: 80%;
    }

    .icon-group .spacer {
        display: block;
        float: left;
        width: 20%;
    }

    .icon-group .spacer a {
        float: none;
        margin: 10px auto 30px;
    }

    .login-modal:not(.register) .login-container .login-inner .login-inner-right {
        padding-top: 7px;
    }

    .login-container {
        max-width: 888px;
    }

    .login-container ul.tab-content {
        border-radius: 12px;
        overflow: hidden;
        position: fixed;
        width: 888px;
    }

    @media (max-width: 775px) {
        .login-container ul.tab-content {
            width: 100%;
        }
    }

    @media (max-width: 653px) {
        .login-container ul.tab-content {
            position: absolute;
        }
    }

    .login-container .login-inner {
        background: #fff;
        position: relative;
    }

    .login-container .login-inner:after {
        clear: both;
        content: "";
        display: table;
    }

    .login-container .login-inner>div {
        float: left;
        width: 50%;
    }

    .login-container .login-inner .login-inner-left {
        padding-top: 50px;
        position: relative;
    }

    .login-container .login-inner .login-inner-left #login-buttons {
        color: #5d676e;
        font-size: 14px;
        margin: 0 auto;
        max-width: 348px;
        width: 80%;
    }

    .login-container .login-inner .login-inner-left #login-buttons a {
        color: #83c11f;
        font-weight: 700;
    }

    .login-container .login-inner .login-inner-right p {
        color: #868d92;
        font-size: 13px;
        margin-bottom: 0;
        text-align: left;
    }

    @media (max-width: 768px) {
        .login-container .login-inner .login-inner-left {
            padding-top: 69px;
        }
    }

    @media (max-width: 653px) {
        .login-container .login-inner>div {
            float: none;
            width: 100%;
        }

        .login-container .login-inner>div .signup-account {
            display: none;
        }

        .login-container .login-inner>div .social-login {
            margin-bottom: 36px;
        }

        .login-container .login-inner>div .form-group {
            padding-top: 27px !important;
        }

        .login-container .login-inner>div .login-form__submit {
            margin-top: 47px;
        }

        .login-container .login-inner>div .tc-check {
            font-size: 10px !important;
            padding-top: 3px;
        }

        .login-container .login-inner>div .tc-check a {
            font-size: 10px;
        }

        .login-container .login-inner .login-inner-left {
            padding: 40px 20px 0;
        }

        .login-container .login-inner .login-inner-left .social-login .social-login__link a {
            width: 100%;
        }

        .login-container .login-inner .login-inner-left .social-login .social-login__link a div {
            display: inline;
            width: 70px;
        }

        .login-container .login-inner .login-inner-left .or-line {
            height: 2px;
            left: 50%;
            right: auto;
            top: auto;
            transform: translate(-50%);
            width: calc(100% - 40px);
        }

        .login-container .login-inner .login-inner-right p {
            margin: 10px 0;
        }
    }

    .login-container .social-login {
        margin-bottom: 24px;
    }

    .login-container .social-login .social-login__link:last-child a {
        margin: 0 auto;
    }

    .login-container .social-login .social-login__link a {
        align-items: center;
        border: 1px solid #b3bdc0;
        border-radius: 4px;
        color: #5d676e;
        display: flex;
        font-size: 12px;
        margin: 0 auto 12px;
        max-width: 348px;
        padding: 6px 10px;
        width: 80%;
    }

    .login-container .social-login .social-login__link a.google-login img {
        top: 0;
    }

    .login-container .social-login .social-login__link a img {
        position: relative;
        top: -1px;
        width: 16px;
    }

    .login-container .social-login .social-login__link a.active,
    .login-container .social-login .social-login__link a:hover {
        border-color: #5d676e;
        font-weight: 500;
    }

    @media (max-width: 653px) {
        .login-container .social-login .social-login__link a {
            border-radius: 12px;
            font-size: 14px;
            margin-bottom: 16px;
            padding: 8px 10px 7px;
        }

        .login-container .social-login .social-login__link a img {
            width: 20px;
        }
    }

    .login-container .social-login .social-login__link div {
        height: 23px;
        margin-right: 12px;
        text-align: right;
        width: 100px;
    }

    .login-container .tabs {
        display: flex;
        float: none;
        justify-content: center;
        max-width: 100%;
    }

    .login-container .tab>.icon-rocket {
        display: none;
    }

    .login-container .tab .icon-rocket.mobile-rocket {
        bottom: 0;
        display: block;
        font-size: 50px;
    }

    .login-container .tab#signup .login-right {
        min-height: 0;
    }

    .login-container .tab .login-left,
    .login-container .tab .login-right {
        float: none;
        width: 100%;
    }

    .login-container .tab .login-left {
        padding-bottom: 6px;
        padding-top: 33px;
    }

    .login-container .tab .login-left .icon-lightbulb {
        display: none;
    }

    .login-container .tab h1,
    .login-container .tab h3 {
        margin-bottom: 10px;
        padding-top: 0;
    }

    .login-container .tab h4 {
        margin: 15px 0;
    }

    .login-container .tab span.login-title {
        color: #fff;
        display: block;
        font-size: 36px;
        font-weight: 500;
        line-height: 50px;
        margin-bottom: 7px;
        padding-top: 0;
    }

    @media (max-width: 653px) {
        .login-container .tab span.login-title {
            font-size: 22px !important;
            line-height: 24px;
            margin-bottom: 9px;
        }

        .login-container .form-group {
            padding: 20px 20px 30px;
        }
    }

    .login-form__submit {
        margin-top: 104px;
        position: relative;
    }

    .login-form__submit:after {
        background: url(/html/site/img/header/pointer.svg);
        bottom: 36px;
        content: "";
        height: 78px;
        left: 50%;
        pointer-events: none;
        position: absolute;
        transform: translate(-50%);
        width: 100px;
    }
</style>
<div class="login-links">
    <a class="login-button login-mobile" href="#">
        Log In<span>&nbsp;</span>
    </a>
</div>
<div class="modal-outer">
    <div class="login-modal" style="display: none;">
        <div class=" inner-modal">
            <div id="login-container-element" class="login-container">
                <div class="clearfix"></div>
                <ul class="tab-content">
                    <li id="login" class="tab active" style="">
                        <div class="close-modal"><span class="icon-cross2"></span></div>
                        <div class="login-left">
                            <span class="login-title">Welcome Back!</span>
                            <p><a title="What will you learn today? Find out, with Alison." href="https://alison.com/courses" class="green">What will you learn today? Find out, with Alison.</a></p>
                        </div>
                        <div class="login-right">
                            <div class="tabs">
                                <div class="register-tab switch-tab"><a href="https://alison.com/register">Sign Up</a></div>
                                <div class="login-tab login-account switch-tab active"><a href="https://alison.com/login">Log In</a></div>
                            </div>
                            <div class="login-inner">
                                <div class="login-inner-left">
                                    <div class="social-login">
                                        <div class="social-login__link">
                                            <a href="/auth/facebook?redirect_url=https://alison.com&amp;route_name=site.home" rel="nofollow" title="Register/Log In with Facebook">
                                                <div>
                                                    <img width="23px" height="23px" alt="Facebook" src="https://cdn01.alison-static.net/public/html/site/img/header/facebook-square.svg">
                                                </div>
                                                Continue with Facebook
                                            </a>
                                        </div>
                                        <div class="social-login__link">
                                            <a class="google-login" href="/auth/google?redirect_url=https://alison.com&amp;route_name=site.home" rel="nofollow" title="Register/Log In with Google">
                                                <div>
                                                    <img width="23px" height="23px" alt="Google" src="https://cdn01.alison-static.net/public/html/site/img/header/google-square.svg">
                                                </div>
                                                Continue with Google
                                            </a>
                                            <div id="google-custom" style="display:none;"></div>
                                        </div>
                                        <div class="social-login__link">
                                            <a href="/auth/live?redirect_url=https://alison.com&amp;route_name=site.home" rel="nofollow" title="Register/Log In with Microsoft">
                                                <div>
                                                    <img width="23px" height="23px" alt="Microsoft" src="https://cdn01.alison-static.net/public/html/site/img/header/microsoft-square.svg">
                                                </div>
                                                Continue with Microsoft
                                            </a>
                                        </div>
                                        <div class="social-login__link">
                                            <a href="/auth/linkedin?redirect_url=https://alison.com&amp;route_name=site.home" rel="nofollow" title="Register/Log In with LinkedIn">
                                                <div>
                                                    <img alt="LinkedIn" width="23px" height="23px" src="https://cdn01.alison-static.net/public/html/site/img/header/linkedin-square.svg">
                                                </div>
                                                Continue with Linkedin
                                            </a>
                                        </div>
                                    </div>
                                    <ul id="login-buttons" class="tab-navbar">
                                        <li class="signup-account switch-tab">
                                            Don't have an Alison account? <a href="https://alison.com/register">Sign Up</a>
                                        </li>
                                    </ul>
                                    <div class="or-line">
                                        <span>or</span>
                                    </div>
                                </div>
                                <div class="login-inner-right">
                                    <div class="form-group">
                                        <form method="POST" action="https://alison.com/learner-entry" accept-charset="UTF-8" data-login-form="" name="login-form"><input name="_token" type="hidden" value="DceNzZKBI0nM5GHrtqwwW7bv7dsYAIX7tzp0MyeR">
                                            <div class="input-field ">
                                                <input class="form-control" placeholder="Email" required="" name="email" type="email">
                                            </div>
                                            <div class="input-field ">
                                                <input class="form-control" placeholder="Password" required="" autocomplete="off" name="password" type="password" value="">
                                                <div class="icon-visible password-toggle"></div>
                                            </div>
                                            <p class="half-width check">
                                                <input id="remember" checked="checked" name="remember" type="checkbox" value="1">
                                                <label for="remember" class="form-checkbox">Keep me logged in</label>
                                            </p>
                                            <ul class="half-width">
                                                <li data-name="forgotpassword" class="form-link tab-title">
                                                    <a href="#">Forgot password?</a>
                                                </li>
                                            </ul>
                                            <input name="current" type="hidden" value="https://alison.com">
                                            <input name="route_name" type="hidden" value="site.home">
                                            <div class="login-form__submit">
                                                <input class="submit-login" type="submit" value="Log In">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="signup" class="tab active.login-left" style="display: none;">
                        <span class="icon-rocket"></span>
                        <div class="close-modal"><span class="icon-cross2"></span></div>
                        <div class="login-left">
                            <span class="login-title">Sign Up For Free</span>
                            <p class="sub-msg">Join the World’s Largest Free Learning Community</p>
                        </div>
                        <div class="login-right">
                            <div class="tabs">
                                <div class="register-tab switch-tab"><a href="https://alison.com/register">Sign Up</a></div>
                                <div class="login-tab login-account switch-tab active"><a href="https://alison.com/login">Log In</a></div>
                            </div>
                            <div class="wide-line"></div>
                            <div class="login-inner">
                                <div class="login-inner-left">
                                    <div class="social-login">
                                        <div class="social-login__link">
                                            <a href="/auth/facebook?redirect_url=https://alison.com&amp;route_name=" rel="nofollow" title="Register/Log In with Facebook">
                                                <div>
                                                    <img width="23px" height="23px" alt="Facebook" src="https://cdn01.alison-static.net/public/html/site/img/header/facebook-square.svg">
                                                </div>
                                                Continue with Facebook
                                            </a>
                                        </div>
                                        <div class="social-login__link">
                                            <a class="google-login" href="/auth/google?redirect_url=https://alison.com&amp;route_name=" rel="nofollow" title="Register/Log In with Google">
                                                <div>
                                                    <img width="23px" height="23px" alt="Google" src="https://cdn01.alison-static.net/public/html/site/img/header/google-square.svg">
                                                </div>
                                                Continue with Google
                                            </a>
                                            <div id="google-custom" style="display:none;"></div>
                                        </div>
                                        <div class="social-login__link">
                                            <a href="/auth/live?redirect_url=https://alison.com&amp;route_name=" rel="nofollow" title="Register/Log In with Microsoft">
                                                <div>
                                                    <img width="23px" height="23px" alt="Microsoft" src="https://cdn01.alison-static.net/public/html/site/img/header/microsoft-square.svg">
                                                </div>
                                                Continue with Microsoft
                                            </a>
                                        </div>
                                        <div class="social-login__link">
                                            <a href="/auth/linkedin?redirect_url=https://alison.com&amp;route_name=" rel="nofollow" title="Register/Log In with LinkedIn">
                                                <div>
                                                    <img alt="LinkedIn" width="23px" height="23px" src="https://cdn01.alison-static.net/public/html/site/img/header/linkedin-square.svg">
                                                </div>
                                                Continue with Linkedin
                                            </a>
                                        </div>
                                    </div>
                                    <ul id="login-buttons" class="tab-navbar">
                                        <li class="signup-account login-account switch-tab active">
                                            Already have an Alison account? <a href="https://alison.com/login">Log In</a>
                                        </li>
                                    </ul>
                                    <div class="or-line slide-on-social">
                                        <span>or</span>
                                    </div>
                                </div>
                                <div class="login-inner-right">
                                    <div class="form-group email-signup slide-on-social">
                                        <p>This is the name that will appear on your Certification</p>
                                        <form method="POST" action="https://alison.com/register" accept-charset="UTF-8" data-signup-form="" id="signup-form" name="register-form"><input name="_token" type="hidden" value="DceNzZKBI0nM5GHrtqwwW7bv7dsYAIX7tzp0MyeR">
                                            <div class="input-field name name-float first-name ">
                                                <input class="form-control" id="firstName" placeholder="First Name" autocomplete="off" minlength="2" required="" name="firstname" type="text">
                                            </div>
                                            <div class="input-field name-float last-name ">
                                                <input class="form-control" id="lastName" placeholder="Surname" autocomplete="off" minlength="2" required="" name="lastname" type="text">
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="input-field-email ">
                                                <input class="form-control" id="emailNew" placeholder="E-mail" autocomplete="off" required="" name="signup_email" type="email">
                                            </div>
                                            <div class="input-field ">
                                                <input class="form-control" id="signup_password" placeholder="Password" autocomplete="off" minlength="6" required="" name="signup_password" type="password" value="">
                                                <div class="icon-visible password-toggle"></div>
                                            </div>
                                            <div class="hide-on-social">
                                                <p class="terms-conditions">
                                                    <input id="signup_tc" name="signup_tc" type="checkbox">
                                                    <label for="signup_tc" class="form-checkbox tc-check">I agree to the <a href="https://alison.com/about/terms-of-use" target="_blank">Terms and Conditions</a></label>
                                                    <input name="signup_emails" type="hidden" value="1">
                                                </p>
                                                <input name="current" type="hidden" value="https://alison.com">
                                                <input name="route_name" type="hidden" value="site.home">
                                                <div class="login-form__submit">
                                                    <input class="submit-login signup-button" type="submit" value="Sign Up">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group social-signup" style="display: none">
                                        <form method="POST" action="https://alison.com" accept-charset="UTF-8" social-form="" id="social-form" name="social-form"><input name="_token" type="hidden" value="DceNzZKBI0nM5GHrtqwwW7bv7dsYAIX7tzp0MyeR">
                                            <p class="terms-conditions">
                                                <input id="signup_tc_social" name="signup_tc_social" type="checkbox">
                                                <label for="signup_tc_social" class="form-checkbox tc-check">I agree to the <a href="https://alison.com/about/terms-of-use" target="_blank">Terms and Conditions</a></label>
                                                <input name="signup_emails_social" type="hidden" value="1">
                                                <input class="submit-login signup-button" type="submit" value="Sign Up">
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li id="forgotpassword" class="tab ">
                        <div class="login-left">
                            <span class="login-title">Forgot password?</span>
                            <p>
                                Please enter you email address and we will mail you a link to reset your password. </p>
                        </div>
                        <div class="login-right">
                            <div class="form-group">
                                <form method="POST" action="https://alison.com/password/email" accept-charset="UTF-8" data-forgot-form="" name="forgot-password-form"><input name="_token" type="hidden" value="DceNzZKBI0nM5GHrtqwwW7bv7dsYAIX7tzp0MyeR">
                                    <div class="input-field ">
                                        <input class="form-control" placeholder="Email address" required="" name="email" type="email">
                                    </div>
                                    <input class="submit-login" type="submit" value="Reset my password">
                                    <ul id="login-buttons" class="tab-navbar">
                                        <li class="signup-account tab-title" data-name="login">
                                            <a href="#"><span class="icon-chevrons-left"></span>Back to login</a>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    var route_name = "site.home";
    // Update route name if hash exists 
    if(window.location.hash !== '#event=login'){ $('input[name=route_name]').val(route_name); }  $(document).ready(function(){ if(location.hash === '#forgotpassword'){ $('li.tab').hide();
    $('#forgotpassword').show();
    }
    // Password field toggle visible 
    $('.password-toggle').click(function() { $(this).toggleClass("icon-visible-green");
    var input = $(this).parent().find('input');
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
    });
    $('.tab-title').on('click', function(e) {
        if ($(this).attr('data-url')) {
            return;
        }
        e.preventDefault();
        e.stopImmediatePropagation();
        if (!$(this).hasClass('active')) {
            var attrName = $(this).attr('data-name');
            var elemName = $.find('#' + attrName);
            if (attrName === 'login' || attrName === 'signup' || attrName === 'forgotpassword') {
                if (!($(this).hasClass('active'))) {
                    $(this).insertBefore($(this).prev());
                }
                if (attrName === 'login') {
                    $('#welcome').show();
                    $('#join-us').hide();
                    $('.tab-title').removeClass('active');
                    $('.inner-modal').hasClass('forgot') && $('.inner-modal').removeClass('forgot');
                } else if (attrName === 'signup') {
                    $('#welcome').hide();
                    $('#join-us').show();
                    $('.tab-title').removeClass('active');
                    $('.inner-modal').hasClass('forgot') && $('.inner-modal').removeClass('forgot');
                } else {
                    $('.inner-modal').addClass('forgot');
                    $('.tab-title').removeClass('active');
                }
            }
            $(this).siblings('.tab-title').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').find(elemName).siblings().removeClass('active').hide();
            $('.tab-content').find(elemName).fadeIn('fast').addClass('active');
        }
    });
    var errors = $.find('.error-message');
    if (errors.length) {
        var tab = $(errors).first().closest('.tab');
        $(tab).parent().children().removeClass('active');
        $(tab).addClass('active');
    }
    /** * Google sign in */
    $('.login-links').click(function() {
        loadScript('https://apis.google.com/js/api:client.js', function() {
            var auth2, startApp = function() {
                gapi.load('auth2', function() {
                    var client_id = $('body').attr('data-gclient_id');
                    // Retrieve the singleton for the GoogleAuth library and set up the client. auth2 = gapi.auth2.init({ client_id: client_id, cookiepolicy: 'single_host_origin', });
                    redirectUser(document.getElementById('google-custom'));
                });
            };
            /** * Send logged in user to the appropriate BE URL * * @param element {HTMLElement} - The element to attacj click handler to * */
            function redirectUser(element) {
                auth2.attachClickHandler(element, {}, function(googleUser) {
                    var response = googleUser.getAuthResponse(true);
                    window.location = window.location.protocol + '//' + window.location.hostname + '/auth/google-token-sign-in/' + response.id_token + '?redirect_url=https://alison.com&route_name=site.home';
                }, function(error) {
                    console.log(JSON.stringify(error));
                });
            }
            startApp();
        });
    }); // Fade in when header buttons are clicked 
    if($('.login-modal').length > 0){ $('header .login-links > a').click(function(e){ e.preventDefault();
    // If mobile then scroll to top to meet the position:absolute container 
    if($(window).width() < 768){ $("html, body").animate({ scrollTop: 0 }, 100); }
    if ($(this).hasClass('login-mobile')) {
        showLoginTab();
    } else {
        showRegisterTab();
    }
    });
    }
    // Shows the register tab on the login modal 
    window.showRegisterTab = function(){ $('#login.tab').removeClass('active').hide().next().addClass('active').show(); $('.login-modal').addClass('register').fadeIn(); $('.login-tab').removeClass('active'); $('.register-tab').addClass('active'); }
    // Shows the login tab on the login modal 
    window.showLoginTab = function(){ $('#login.tab').addClass('active').show().next().removeClass('active').hide(); $('.login-modal').removeClass('register').fadeIn(); $('.register-tab').removeClass('active'); $('.login-tab').addClass('active'); } });
    if ($('.modal-outer').length > 0) {
        $('.close-modal').click(function() {
            $('.login-modal').fadeOut();
        });
        $('.modal-outer .login-modal').click(function(e) {
            var empty = true;
            $('.modal-outer .form-control').each(function() {
                if ($(this).val() !== '') {
                    empty = false;
                }
            });
            if (e.target.className === 'login-modal' && empty === true) {
                if ($('.topic-modal').length == 0) {
                    $('.login-modal').fadeOut();
                }
            }
        });
    }
    /** * Switch between login and register */
    $('.login-modal .switch-tab').click(function(e) {
        e.preventDefault();
        $(window).scrollTop(0);
        $('.switch-tab.active').removeClass('active');
        $('.switch-tab a[href="' + $(this).find('a').attr('href') + '"]').parents('.switch-tab').addClass('active');
        if (!$(this).hasClass('login-account')) {
            $('#login.tab').removeClass('active').hide().next().addClass('active.login-left').show();
        } else {
            $('#signup.tab').removeClass('active').hide().prev().addClass('active').show();
        }
        $('.login-modal').toggleClass('register');
    });
    /** * Show modal and switch tab if error */
    if ($('.login-modal').length > 0) {
        if ($('.inner-modal #login .error-message').length > 0) {
            $('.login-modal').fadeIn(function() {
                $('.inner-modal').fadeIn();
            })
        } else if ($('.inner-modal #signup .error-message').length > 0) {
            $('#signup').addClass('active').show().prev().removeClass('active').hide();
            $('.login-modal').fadeIn(function() {
                $('.inner-modal').fadeIn();
            });
            $('.login-modal').toggleClass('register');
        }
    }
    // This is for GDPR Boxed on register // Open social logins in new windows 
    $('.social-login__link a').click(function(e){ e.preventDefault();
    if (!$(this).hasClass('active')) {
        $('.social-login__link a.active').removeClass('active');
    }
    var signup = $('#signup:visible').length > 0,
        link = $(this).attr('href');
    // Remove click added 
    $('#social-form input[type=submit]').unbind('click');
    // If already has active class then remove it and show the email sign up form 
    if($(this).hasClass('active') && signup){
    $(this).removeClass('active');
    $('.hide-on-social').show();
    $('.social-signup').hide();
    // Hide and show appropriate 
    $('.slide-on-social').slideDown();
    return;
    }
    if (signup) { 
        //Remove previous actives 
        $('#signup .icon-group a.active').removeClass('active');
        // Add active to click icon 
        $(this).addClass('active');
        // Hide and show appropriate 
        $('.hide-on-social').hide(); $('.social-signup').show(); $('.slide-on-social').slideUp();
        // Change form submit url and 
        $('#social-form input[type=submit]').click(function(e){ e.preventDefault();
        var error = $('.s-t-error');
        // Check to see if T&Cs checked 
        if ($('#signup_tc_social:checked').length > 0) { $('#signup_tc_social').removeClass('error'); error.hide();
        var accept = 1;
        if ($('#signup_emails_social').length !== 0) {
            accept = $('#signup_emails_social:checked').length;
        }
        loadSocialPopup(link + '?signup_emails=' + accept);
    } else {
        $('#signup_tc_social').addClass('error');
        if (error.length > 0) {
            error.show();
        } else {
            $(' .social-signup .tc-check').after('<div class="errors terms-error s-t-error"><span class="icon-error"></span>' + '<span class="error-message">Please agree to Terms &amp; Conditions to continue</span>' + '</div>');
        }
    }
    });
    } else {
        loadSocialPopup(link);
    }
    });
    /** * Check the validity of the first and second name * */
    $('.signup-button').click(function(e) {
        e.preventDefault();
        var error = $('.t-error');
        if ($('#signup_tc:checked').length > 0) {
            //Check validity of firstname & lastname 
            var regex = /^([a-zA-Z '-]*)$/, submit=true;
            //Remove existing name errors 
            $(".name-errors").remove();
            if (!regex.test($("#firstName").val())) {
                addNameError("The firstname is in an invalid format");
                submit = false;
            }
            if (!regex.test($("#lastName").val())) {
                addNameError("The lastname is in an invalid format");
                submit = false;
            }
            // If submit is true hide errors and submit the form 
            if(submit){ error.hide(); $('#signup-form').submit(); }
        } else {
            if (error.length > 0) {
                error.show();
            } else {
                $(' #signup_tc + .tc-check').after('<div class="errors terms-error t-error"><span class="icon-error"></span>' + '<span class="error-message">Please agree to Terms &amp; Conditions to continue</span>' + '</div>');
            }
        }
    });
    // If TC box is checked then check the other one 
    $('.tc-check').click(function(e){ e.preventDefault();
    if ($(e.target).attr('target') === '_blank') {
        window.open($(e.target).attr('href'), '_blank');
        return
    }
    $('.tc-check').prev().prop('checked', !$(this).prev().is(':checked'));
    });
    // If Email box is checked then check the other one 
    $('.email-check').click(function(e){ e.preventDefault(); $('.email-check').prev().prop('checked', !$(this).prev().is(':checked')) });
    /** * Load the social login in a new window * * @param link * */
    function loadSocialPopup(link) {
        if (link.indexOf("google") > 0) {
            $("#google-custom").click();
        } else { 
            // Open Popup window with social login 
            var socialWindow = window.open(link, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
            // Add listener to check for messages 
            window.addEventListener("message", receiveMessage, false);
            // If message is recieved, then close window 
            function receiveMessage(event){ 
                if(event.data.indexOf('-close') > -1){ socialWindow.close(); 
                    // Close popup
            // Update route name if hash exists 
            if(window.location.hash === '#event=login'){ $('.loading').fadeIn(); window.location.href = $('input[name=current]').val(); } else{ window.location.href = event.data.split('-close')[0]; } } } } }
            /** * Add error when name is wrong * * @param error * */
            function addNameError(error) {
                $(".input-field-email").before("<div class='errors name-errors'>" + "<span class='icon-error'></span>" + "<span class='error-message'>" + error + "</span>" + "</div>" + "<div class='clearfix'></div>");
            }
            /** * Blur login form so we can't submit multiple times * */
            var form = $('form[name=login-form]');
            form.submit(function(e) {
                form.blur();
            });
            $(window).unload(function() {
                form.blur();
            });
            form.find('input').bind('keypress', function(e) {
                if (e.keyCode == 13) {
                    $(this).blur();
                }
            });
</script>