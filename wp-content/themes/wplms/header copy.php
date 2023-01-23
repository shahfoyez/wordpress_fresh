<?php
//Header File
if (!defined('ABSPATH'))
    exit;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <?php
        wp_head();
        ?>
    </head>
<style>
    .icon-nb-menu:before {
            content: "hello"
        }
    .header {
        align-items: center;
        background: #fff;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .08);
        display: flex;
        height: 72px;
        position: relative;
        z-index: 9999 !important
    }
    .header .header__search {
        height: 36px;
        width: 365px
    }
    .header .header__search #alison_logo {
        margin: 0 20px 0 24px;
        position: relative
    }
    .header .header__search #alison_logo:after {
        bottom: 6px;
        color: #465159;
        content: "Empower Yourself";
        font-size: 10px;
        left: 0;
        letter-spacing: 1.2px;
        position: absolute;
        text-transform: uppercase;
        width: 130px
    }
    .header .header__search .header__search-input {
        float: right;
        width: 204px
    }
    .header .header__search .header__search-input input {
        border: 1px solid #b3bdc0;
        border-bottom-left-radius: 4px;
        border-right: none;
        border-top-left-radius: 4px;
        font-size: 12px;
        height: 36px;
        padding: 10px;
        width: calc(100% - 38px)
    }
    .header .header__search .header__search-input input::-moz-placeholder {
        font-size: 12px
    }
    .header .header__search .header__search-input input::placeholder {
        font-size: 12px
    }
    .header .header__search .header__search-input button {
        background: #5d676e;
        border: 1px solid #5d676e;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        float: right;
        height: 36px;
        padding: 2px 0 0;
        margin-top: -36px;
        width: 38px
    }
    .header .header__search .header__search-input button span:before {
        font-size: 14px
    }
    @media(max-width:1280px) and (min-width:977px) {
        .header .header__search {
            width: 331px
        }

        .header .header__search .header__search-input {
            width: 196px
        }

        .header .header__search .header__search-input input {
            padding-left: 10px;
            padding-right: 10px
        }

        .header .header__search #alison_logo {
            display: inline-block;
            top: 5px;
            width: 91px
        }

        .header .header__search #alison_logo:after {
            font-size: 7px;
            left: 4px;
            width: 90px
        }

        .header .header__search #alison_logo img {
            width: 100%
        }
    }

    @media(max-width:977px) {
        .header .header__search {
            height: auto;
            width: 100%
        }

        .header .header__search #alison_logo {
            display: block;
            letter-spacing: .42px;
            margin: 4px auto 0;
            text-align: center;
            width: 75px
        }

        .header .header__search #alison_logo:after {
            bottom: 3px;
            font-size: 7px;
            left: 0;
            letter-spacing: .3px;
            width: 78px
        }

        .header .header__search #alison_logo img {
            width: 100%
        }

        .header .header__search .header__search-input {
            bottom: 1px;
            display: none;
            float: none;
            position: absolute;
            transform: translateY(100%);
            width: 100%
        }

        .header .header__search .header__search-input .search-container {
            background: #f8fafa;
            padding: 12px 25px
        }

        .header .header__search .header__search-nav {
            display: block !important;
            left: 15px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%)
        }

        .header .header__search .header__search-nav span {
            color: #5d676e
        }

        .header .header__search .header__search-nav .icon-nb-menu {
            margin-right: 11px
        }

        .header .header__search .header__search-nav .icon-nb-menu.close:before {
            content: "\ea0f"
        }
    }

    .header .header__nav {
        height: 16px;
        padding-left: 14px;
        width: calc(100% - 658px)
    }

    .header .header__nav .nav__dropdown {
        left: 0
    }

    .header .header__nav>.for-desktop>.nav__item {
        padding: 0 14px
    }

    .header .header__nav>.for-desktop>.nav__item>a {
        margin-right: 0;
        text-align: center
    }

    .header .header__nav>.for-desktop>.nav__item .english-vertical-link img {
        display: block;
        margin: 3px 4px;
        width: 21px
    }

    .header .header__nav>.for-desktop .nav__children-sub {
        max-height: 561px;
        padding: 0 0 0 12px
    }

    @media(min-width:992px) and (max-height:670px) {
        .header .header__nav>.for-desktop .nav__children-sub {
            max-height: calc(100vh - 187px)
        }
    }

    .header .header__nav>.for-desktop .nav__children-sub .mCSB_draggerRail {
        background-color: transparent !important;
        box-shadow: none !important
    }

    @media(max-width:1280px) and (min-width:977px) {
        .header .header__nav {
            width: calc(100% - 548px)
        }
    }

    @media(max-width:1190px) and (min-width:977px) {
        .header .header__nav .for-desktop>.nav__item:nth-child(2) {
            display: none
        }
    }

    @media(max-width:977px) {
        .header .header__nav {
            display: block;
            height: auto;
            left: 0;
            padding: 0;
            pointer-events: none;
            position: absolute;
            top: 48px;
            width: 100%
        }

        .header .header__nav.nav .nav__dropdown {
            transition: left .3s ease-in-out
        }

        .header .header__nav.nav .nav__dropdown.nav__dropdown--user-menu {
            background: #fff;
            position: static;
            transform: translate(-100%);
            transition: transform .3s ease-in-out;
            width: 100%
        }

        .header .header__nav.nav .nav__dropdown.nav__dropdown--user-menu.active {
            transform: translate(0)
        }

        .header .header__nav.nav .nav__dropdown.nav__dropdown--user-menu .nav__dropdown-inner {
            border-radius: 0;
            min-height: 560px;
            padding: 1px 0 12px;
            right: 0;
            width: 100%
        }

        .header .header__nav .nav__dropdown {
            display: block !important;
            pointer-events: all
        }

        .header .header__nav .nav__dropdown .nav__dropdown-inner,
        .header .header__nav .nav__dropdown.nav__dropdown--categories {
            box-shadow: inset 0 7px 9px -7px rgba(0, 0, 0, .16)
        }

        .header .header__nav .nav__dropdown.nav__dropdown--categories .nav__item-link,
        .header .header__nav .nav__dropdown.nav__dropdown--categories a {
            padding: 11px 0 11px 48px
        }
    }

    @media(max-width:977px) and (max-width:991px) {

        .header .header__nav .nav__dropdown.nav__dropdown--categories .nav__item-link,
        .header .header__nav .nav__dropdown.nav__dropdown--categories a {
            display: block
        }

        .header .header__nav .nav__dropdown.nav__dropdown--categories .nav__item-link .nav__item-inner,
        .header .header__nav .nav__dropdown.nav__dropdown--categories a .nav__item-inner {
            display: flex
        }
    }

    @media(max-width:977px) {
        .header .header__nav .nav__dropdown.nav__dropdown--user-menu a.header__user-continue {
            background-color: #f5faec;
            color: #83c124;
            display: flex;
            font-size: 16px;
            font-weight: 500;
            justify-content: center;
            margin: 16px auto 13px;
            max-width: 312px;
            padding: 12px 0;
            width: 312px
        }

        .header .header__nav .nav__dropdown.nav__dropdown--user-menu a.header__user-continue:after {
            display: none
        }

        .header .header__nav .nav__dropdown.nav__dropdown--user-menu a.header__user-continue .icon-start-topic {
            background: 0 0;
            font-size: 20px;
            height: auto;
            margin-right: 8px;
            top: 0;
            width: auto
        }

        .header .header__nav .for-mobile .nav__item--slide .nav__dropdown {
            height: calc(100vh - 48px)
        }

        .header .header__nav .for-mobile .mCSB_container,
        .header .header__nav .for-mobile .mCustomScrollBox {
            overflow: visible !important
        }
    }

    .header .header__user {
        padding-left: 0;
        position: absolute;
        right: 0;
        top: 17px
    }

    @media(max-width:1280px) and (min-width:977px) {
        .header .header__user.header__user--logged-in {
            width: 359px
        }

        .header .header__user.header__user--logged-in.nav .nav__item>a.header__user-continue {
            font-size: 12px;
            padding: 8px 12px 8px 11px
        }

        .header .header__user.header__user--logged-in.nav .nav__item>a.header__user-continue span {
            margin-right: 4px
        }
    }

    @media(max-width:977px) {
        .header .header__user {
            margin: 6px auto 0;
            top: 6px;
            width: 80px
        }

        .header .header__user.header__user--logged-out {
            margin: 0;
            padding-right: 0;
            right: 3px;
            top: 4px;
            width: 136px
        }

        .header .header__user.header__user--logged-out .header__user-register,
        .header .header__user.header__user--logged-out>.nav__item--slide {
            display: none
        }

        .header .header__user.header__user--logged-out>div>a:first-child {
            color: #6ea21f;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0;
            margin-right: 0
        }

        .header .header__user.header__user--logged-out>div>a:first-child span {
            display: inline !important
        }

        .header .header__user>.nav__item:first-child:not(.nav__item--user-menu) {
            display: none
        }

        .header .header__user .nav__item--dropdown {
            position: static
        }

        .header .header__user .nav__item--dropdown.nav__item--slide {
            position: relative
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide {
            box-shadow: none;
            height: 0;
            left: unset;
            position: relative;
            top: unset;
            transition: height .3s ease-in-out
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide .subnav-back {
            display: none !important
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide span {
            background: 0 0
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide ul:before {
            background: #f3f6f7;
            content: "";
            height: calc(100% - 27px);
            left: 18px;
            position: absolute;
            width: 1px
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide li {
            margin-left: 14px;
            position: relative
        }

        .header .header__user .nav__item--dropdown.nav__item--slide .nav__dropdown--slide li:before {
            background: #f4f6f9;
            content: "";
            height: 1px;
            left: 4px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 10px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu {
            display: block !important;
            right: 0;
            top: 36px;
            transition: width .3s ease-in-out;
            width: 0
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.nav__dropdown--visible {
            width: 315px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu .nav__dropdown--languages {
            background: 0 0;
            padding: 0
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-level-2 .nav__item--slide .nav__dropdown--slide {
            height: 275px;
            width: calc(100% - 30px)
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-categories-2 li:nth-child(2) span img {
            width: 14px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-categories-2 a {
            padding: 9px 0 9px 48px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-categories-2 a span img {
            width: 15px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-categories-2 a span .icon-thick-chevron-up:before {
            color: #969696
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu .nav__dropdown-inner {
            border-bottom-right-radius: 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            box-shadow: inset 0 7px 9px -7px rgba(0, 0, 0, .16);
            padding: 1px 0 12px;
            right: 0 !important;
            width: 315px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu a.header__user-continue {
            background-color: #f5faec;
            color: #83c124;
            display: flex;
            font-size: 16px;
            font-weight: 500;
            justify-content: center;
            margin: 16px auto 13px;
            max-width: 275px;
            padding: 13px 0;
            width: 312px
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu a.header__user-continue:after {
            display: none
        }

        .header .header__user .nav__dropdown.nav__dropdown--user-menu a.header__user-continue .icon-start-topic {
            background: 0 0;
            font-size: 20px;
            height: auto;
            margin-right: 8px;
            top: 0;
            width: auto
        }

        .header {
            height: 48px
        }
    }

    .for-mobile {
        display: none
    }

    @media(max-width:977px) {
        .for-mobile {
            display: block !important
        }

        .for-desktop {
            display: none
        }
    }

    .darken {
        background: rgba(46, 44, 44, .45);
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999
    }

    .nav {
        display: flex;
        padding-left: 28px
    }

    .nav .buy-cert {
        position: relative
    }

    .nav .buy-cert:after {
        align-items: center;
        background: #ea1d2d;
        border-radius: 100%;
        box-shadow: 0 3px 6px #e8a7ac;
        color: #fff;
        content: attr(data-amount);
        display: flex;
        font-size: 10px;
        height: 16px;
        justify-content: center;
        position: absolute;
        right: 0;
        top: -11px;
        width: 16px
    }

    .nav .buy-cert.hide-buy-cert:after {
        display: none
    }

    @media(max-width:997px) {
        .nav .claim-your-certs:after {
            display: none
        }
    }

    .nav .get-your-cert span.user-img:after,
    .nav .nav__item--user-menu.user-img:after {
        right: 8px;
        top: -10px
    }

    @media(min-width:978px) {

        .nav .get-your-cert span.buy-cert:after,
        .nav .nav__item--user-menu.buy-cert:after {
            display: none
        }
    }

    .nav .get-your-cert .buy-cert:after {
        right: -19px;
        top: -9px
    }

    .nav .nav__item {
        display: inline
    }

    .nav .nav__item:nth-child(2)>a:after {
        padding-right: 4px
    }

    .nav .nav__item>a {
        color: #465159;
        display: inline-block;
        font-size: 14px;
        margin-right: 28px;
        position: relative;
        transition: all .2s ease-in
    }

    .nav .nav__item>a.header__user-continue {
        background-color: #fff;
        border: 1px solid #83c11f;
        border-radius: 25px;
        color: #83c11f;
        font-size: 14px;
        font-weight: 500;
        margin-right: 14px;
        padding: 9px 19px 9px 11px;
        transition: all .3s ease-in
    }

    .nav .nav__item>a.header__user-continue span {
        color: #83c11f;
        font-size: 14px;
        margin-right: 10px;
        position: relative;
        top: 2px;
        transition: all .3s ease-in
    }

    .nav .nav__item>a.header__user-continue:hover {
        background: #83c11f;
        color: #fff
    }

    .nav .nav__item>a.header__user-continue:hover span {
        color: #fff
    }

    .nav .nav__item>a:after {
        content: attr(title);
        display: block;
        font-weight: 500;
        height: 0;
        overflow: hidden;
        visibility: hidden
    }

    .nav .nav__item>a.activated,
    .nav .nav__item>a:hover {
        font-weight: 500
    }

    .nav .nav__item .icon-dropdown:before {
        color: #465159;
        font-size: 13px;
        transition: all .3s ease-in
    }
    .icon-dropdown:before {
    color: #96999b;
    content: "\e92f";
    }
    .nav .nav__item.nav__item--animation .nav__dropdown-button svg {
        fill: none;
        stroke: none;
        stroke-dasharray: 200 700;
        stroke-dashoffset: 150;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        transition: 1s ease-in-out;
        width: 100%
    }

    .nav .nav__item.nav__item--animation .nav__dropdown-button:hover {
        outline: 1px solid #b3bdc0
    }

    .nav .nav__item.nav__item--animation .nav__dropdown-button:hover svg {
        stroke: #83c11f;
        stroke-width: 1px;
        stroke-dashoffset: -698
    }

    .nav .nav__dropdown-buttons {
        display: flex;
        flex-wrap: wrap
    }

    .nav .nav__dropdown-buttons.nav__dropdown-buttons--large .nav__dropdown-button {
        height: 96px;
        padding: 0 24px
    }

    .nav .nav__dropdown-buttons.nav__dropdown-buttons--large .nav__dropdown-button:nth-child(2n+2) {
        margin-right: 0
    }

    .nav .nav__dropdown-buttons.nav__dropdown-buttons--large .nav__dropdown-button h5 {
        margin-bottom: 8px;
        width: 100%
    }

    .nav .nav__dropdown-buttons.nav__dropdown-buttons--large .nav__dropdown-button img {
        left: auto;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%)
    }

    .nav .nav__dropdown-button {
        align-content: center;
        border-radius: 12px;
        display: flex;
        flex-wrap: wrap;
        margin: 0 20px 16px 0;
        outline: 1px solid #b3bdc0;
        padding: 13px 0 13px 56px;
        position: relative;
        width: 100%
    }

    .nav .nav__dropdown-button:nth-child(3n+3) {
        margin-right: 0
    }

    .nav .nav__dropdown-button:hover {
        outline: 2px solid #83c11f
    }

    .nav .nav__dropdown-button:hover span:after {
        color: #83c11f
    }

    .nav .nav__dropdown-button img {
        left: 10px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%)
    }

    .nav .nav__dropdown-button h5 {
        color: #5d676e;
        font-size: 14px;
        font-weight: 500;
        line-height: 20px;
        margin-bottom: 4px;
        width: 100%
    }

    .nav .nav__dropdown-button span {
        color: #5d676e;
        font-size: 11px
    }

    .nav .border-bottom {
        border-bottom: 1px solid #eaeff4;
        margin-bottom: 6px;
        padding-bottom: 5px
    }

    .nav .border-bottom a {
        padding-bottom: 10px
    }

    .nav .extra-padding {
        padding: 39px 15px
    }

    .nav__dropdown {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .2);
        padding: 20px 19px 5px;
        position: absolute;
        top: 50px;
        width: 332px;
        z-index: 9999
    }

    .nav__dropdown.nav__dropdown--cols {
        width: 588px
    }

    .nav__dropdown.nav__dropdown--cols .nav__dropdown-buttons--large .nav__dropdown-button {
        width: calc(50% - 10px)
    }

    .nav__dropdown.nav__dropdown--cols .nav__dropdown-buttons--large .nav__dropdown-button h5 {
        color: #2d3941
    }

    .nav__dropdown.nav__dropdown--cols .nav__dropdown-buttons--small a {
        width: calc(33.33333% - 14px)
    }

    @media(min-width:978px) {
        .nav__dropdown.nav__dropdown--cols .nav__dropdown-buttons--small a {
            min-height: 83px
        }
    }

    @media(min-width:992px) {
        .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-inner {
            right: 101% !important
        }

        .nav__dropdown.nav__dropdown--user-menu.subnav-active .nav__dropdown-inner .subnav-active .nav__dropdown {
            left: 111% !important
        }
    }

    .nav__dropdown .subnav-active .nav__dropdown {
        left: 0 !important
    }

    .nav__dropdown.nav__dropdown--arrows span:after {
        color: #5d676e;
        content: "\e90e";
        display: inline-block;
        font-family: icomoon;
        font-size: 11px;
        max-width: 9px;
        overflow: hidden;
        position: relative;
        right: -5px;
        text-indent: -2px;
        top: 2px;
        transition: all .3s ease-in
    }

    .nav__dropdown h4 {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 15px
    }

    .nav__dropdown h5 {
        color: #1b232e
    }

    .nav__dropdown--slide {
        overflow: hidden;
        padding: 0;
        text-align: left;
        width: 198px
    }

    .nav__dropdown--slide a {
        color: #1b232e;
        display: block;
        font-size: 14px;
        padding: 14px 0 17px 19px;
        transition: all .3s ease-in
    }

    .nav__dropdown--slide a:hover {
        background: #f3f6f7
    }

    .nav__dropdown--slide img {
        height: 18px;
        margin-right: 13px;
        position: relative;
        top: 4px;
        width: 18px
    }

    .nav__dropdown--categories {
        padding-bottom: 20px
    }

    .nav__dropdown--categories li {
        position: relative
    }

    .nav__dropdown--categories li .nav__item-link div,
    .nav__dropdown--categories li a div {
        font-weight: 700
    }

    .nav__dropdown--categories li .nav__item-link .course-amount,
    .nav__dropdown--categories li a .course-amount {
        display: block;
        font-size: 12px;
        font-weight: 400;
        margin-top: 5px
    }

    .nav__dropdown--categories .subnav-back {
        padding: 10px 15px
    }

    @media(max-width:976px) {
        .nav__dropdown--categories.nav__dropdown--careers .nav__children-sub {
            padding-right: 5px
        }

        .nav__dropdown--categories.nav__dropdown--careers li a div {
            font-weight: 900
        }

        .nav__dropdown--categories.nav__dropdown--careers li a div img {
            height: 33px !important;
            width: 33px !important
        }

        .nav__dropdown--categories.nav__dropdown--careers li a div div {
            max-width: 70%
        }

        .nav__dropdown--categories.nav__dropdown--careers li a div .icon-thick-chevron-up {
            display: none !important
        }

        .nav__dropdown--categories li {
            position: static
        }

        .nav__dropdown--categories li .nav__item-inner {
            position: relative
        }

        .nav__dropdown--categories li a div {
            font-weight: 500
        }
    }

    @media(max-width:410px) {
        .nav__dropdown--categories .nav__children-sub li a {
            padding: 11px 0 11px 28px !important
        }

        .nav__dropdown--categories .nav__children-sub li a div div {
            font-weight: 500;
            max-width: 270px;
            padding-right: 34px
        }
    }

    .nav__item--dropdown {
        position: relative
    }

    .nav__item--dropdown a {
        padding-right: 16px
    }

    .nav__item--dropdown span.icon-dropdown {
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%)
    }

    .nav__item--slide {
        border: 1px solid #5d676e;
        border-radius: 100%;
        cursor: pointer;
        font-size: 15px;
        height: 30px;
        padding-top: 6px;
        text-align: center;
        transition: all .3s ease-in-out;
        width: 30px
    }

    .nav__item--slide:hover {
        border: 1px solid #83c11f
    }

    .nav__item--slide:hover .language {
        background: #83c11f;
        color: #fff;
        transition: all .3s ease-in-out
    }

    .header__user--player,
    .nav__item--user-menu {
        height: 32px
    }

    .header__user--player .nav__item--slide,
    .nav__item--user-menu .nav__item--slide {
        border: 0 solid;
        border-radius: unset;
        height: 0;
        padding: 0;
        position: static;
        top: 0;
        transition: all .3s ease-in;
        width: 332px
    }

    .header__user--player .nav__item--slide .icon-globe,
    .nav__item--user-menu .nav__item--slide .icon-globe {
        display: none
    }

    .header__user--player .nav__item--slide li:first-child,
    .nav__item--user-menu .nav__item--slide li:first-child {
        color: #465159;
        font-size: 16px;
        font-weight: 700
    }

    .header__user--player .nav__item--slide li:first-child>span,
    .nav__item--user-menu .nav__item--slide li:first-child>span {
        display: inline-block;
        font-size: 18px;
        font-weight: 700;
        left: 5px;
        margin-right: 12px;
        position: relative;
        top: 2px;
        transform: rotate(180deg)
    }

    .header__user--player .nav__item--slide .nav__dropdown--slide,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide {
        left: 111%;
        padding-bottom: 19px;
        top: 0;
        width: 100%
    }

    .header__user--player .nav__item--slide .nav__dropdown--slide .nav__item-inner>span,
    .header__user--player .nav__item--slide .nav__dropdown--slide .nav__item-link>span,
    .header__user--player .nav__item--slide .nav__dropdown--slide a>span,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .nav__item-inner>span,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .nav__item-link>span,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide a>span {
        align-items: center;
        display: flex;
        justify-content: center
    }

    .header__user--player .nav__item--slide .nav__dropdown--slide .nav__item-inner>span img,
    .header__user--player .nav__item--slide .nav__dropdown--slide .nav__item-link>span img,
    .header__user--player .nav__item--slide .nav__dropdown--slide a>span img,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .nav__item-inner>span img,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .nav__item-link>span img,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide a>span img {
        margin: 0;
        position: static
    }

    .header__user--player .nav__item--slide .nav__dropdown--slide .subnav-back span,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .subnav-back span {
        position: relative;
        transition: left .3s ease-in-out
    }

    .header__user--player .nav__item--slide .nav__dropdown--slide .subnav-back:hover span,
    .nav__item--user-menu .nav__item--slide .nav__dropdown--slide .subnav-back:hover span {
        left: 0
    }

    @media(max-width:977px) {

        .header__user--player .nav__item--slide .nav__dropdown--slide,
        .nav__item--user-menu .nav__item--slide .nav__dropdown--slide {
            border-radius: 0;
            left: 100%;
            width: 101%
        }
    }

    .nav__dropdown--user-menu {
        background: 0 0;
        border-radius: 0;
        box-shadow: none;
        overflow: hidden;
        padding: 0 0 10px;
        right: -10px;
        top: 60px;
        width: 350px
    }

    .nav__dropdown--user-menu .nav__dropdown-inner {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .2);
        padding-bottom: 19px;
        position: relative;
        right: -10px;
        transition: right .3s ease-in-out;
        width: 332px
    }

    .nav__dropdown--user-menu .nav__dropdown-inner .activate-subnav {
        cursor: pointer;
        position: relative
    }

    .nav__dropdown--user-menu .nav__dropdown-inner .nav__item--slide .nav__item-link:hover img,
    .nav__dropdown--user-menu .nav__dropdown-inner .nav__item--slide a:hover img {
        transform: scale(1.2)
    }

    .nav__dropdown--user-menu .nav__dropdown-inner .nav__item--slide .nav__item-link span img,
    .nav__dropdown--user-menu .nav__dropdown-inner .nav__item--slide a span img {
        height: 16px;
        transition: all .3s ease-in-out;
        width: 16px
    }

    .nav__dropdown--user-menu .nav__dropdown-level-2,
    .nav__dropdown--user-menu .nav__item-link,
    .nav__dropdown--user-menu a:not(.new-profile-link) {
        align-items: center;
        color: #1b232e;
        display: flex;
        flex-wrap: wrap;
        font-size: 14px;
        padding: 9px 0 9px 24px
    }

    .nav__dropdown--user-menu .nav__dropdown-level-2:hover,
    .nav__dropdown--user-menu .nav__item-link:hover,
    .nav__dropdown--user-menu a:not(.new-profile-link):hover {
        font-weight: 500
    }

    .nav__dropdown--user-menu .nav__dropdown-level-2:hover a,
    .nav__dropdown--user-menu .nav__item-link:hover a,
    .nav__dropdown--user-menu a:not(.new-profile-link):hover a {
        font-weight: 400
    }

    .nav__dropdown--user-menu .nav__dropdown-level-2>div>span:first-child,
    .nav__dropdown--user-menu .nav__dropdown-level-2>span:first-child,
    .nav__dropdown--user-menu .nav__item-link>div>span:first-child,
    .nav__dropdown--user-menu .nav__item-link>span:first-child,
    .nav__dropdown--user-menu a:not(.new-profile-link)>div>span:first-child,
    .nav__dropdown--user-menu a:not(.new-profile-link)>span:first-child {
        background: #eaeff4;
        border-radius: 100%;
        display: inline-flex;
        height: 36px;
        justify-content: center;
        margin-right: 16px;
        min-width: 36px;
        padding-top: 0;
        text-align: center;
        width: 36px
    }

    .nav__dropdown--user-menu .nav__dropdown-level-2 {
        padding: 9px 0 4px 24px
    }

    .nav__dropdown--user-menu .header__user-avatar {
        height: 60px;
        margin-right: 16px;
        width: 60px
    }

    .nav__dropdown--user-menu .label-position {
        position: relative;
        top: -14px
    }

    .nav__dropdown--user-menu .block {
        display: block
    }

    .nav__dropdown--user-menu .icon-thick-chevron-up {
        font-weight: 700;
        position: absolute;
        right: 28px;
        top: 50%;
        transform: translateY(calc(-50% - 2px)) rotate(90deg)
    }

    @media(max-width:977px) {
        .nav__dropdown--user-menu {
            padding-bottom: 20px
        }
    }

    .header__user {
        align-items: center;
        display: flex;
        justify-content: flex-end;
        padding-right: 14px;
        width: 430px
    }

    .header__user>div>a {
        color: #83c11f;
        margin-right: 24px
    }

    .header__user .login-links {
        align-items: center;
        display: flex
    }

    .header__user .login-button:hover {
        color: #6ea21f
    }

    .header__user.header__user--logged-out {
        height: 39px;
        padding-left: 0;
        padding-right: 24px;
        width: 365px
    }

    .header__user.header__user--logged-out>div>a:first-child {
        font-weight: 700
    }

    .header__user.header__user--logged-out.nav .nav__dropdown.nav__dropdown--slide {
        right: 0;
        top: 53px
    }

    @media(max-width:580px) {
        .header__user.header__user--logged-out .q-aff {
            margin-right: 7px
        }
    }

    @media(max-width:991px) {
        .header__user.header__user--logged-out .lms-b__button {
            top: auto
        }
    }

    @media(max-width:977px) {
        .header__user.header__user--logged-in {
            padding-right: 16px
        }

        .header__user.header__user--logged-in .nav__item--continue_learning {
            display: none
        }

        .header__user.header__user--logged-in .q-aff {
            margin-right: 12px;
            position: relative;
            top: -4px
        }
    }

    .header__user .header__user-info {
        align-items: center;
        border-bottom: 1px solid #eaeff4;
        display: flex;
        margin-bottom: 8px;
        padding: 18px 0 18px 16px
    }

    .header__user .header__user-info .header__user-name {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 8px
    }

    .header__user .header__user-info .header__user-name+a {
        color: #5d676e;
        padding: 0
    }

    .header__user .header__user-info .header__user-avatar {
        border: none;
        height: 60px;
        width: 60px
    }

    .header__user .header__user-info a {
        color: #5d676e;
        font-size: 13px
    }

    .header__user .header__user-info a:hover {
        color: #83c11f;
        font-weight: 400
    }

    .header__user .header__user-avatar {
        border: 2px solid #b3bdc0;
        border-radius: 100%;
        cursor: pointer;
        display: inline-block;
        height: 32px;
        overflow: hidden;
        position: relative;
        width: 32px
    }

    .header__user .header__user-avatar.pulse {
        -webkit-animation: pulse 1.5s infinite;
        animation: pulse 1.5s infinite;
        box-shadow: 0 0 0 0 rgba(154, 212, 234, .5)
    }

    @-webkit-keyframes pulse {
        0% {
            transform: scale(.9)
        }

        70% {
            box-shadow: 0 0 0 10px transparent;
            transform: scale(1)
        }

        to {
            box-shadow: 0 0 0 0 transparent;
            transform: scale(.9)
        }
    }

    @keyframes pulse {
        0% {
            transform: scale(.9)
        }

        70% {
            box-shadow: 0 0 0 10px transparent;
            transform: scale(1)
        }

        to {
            box-shadow: 0 0 0 0 transparent;
            transform: scale(.9)
        }
    }

    .header__user .header__user-avatar img {
        height: 100%;
        left: 50%;
        min-width: 100%;
        position: absolute;
        transform: translate(-50%)
    }

    @media(max-width:977px) {
        .header__user .header__user-avatar {
            border: none;
            height: 24px;
            width: 24px
        }
    }

    .header__user .header__user-register {
        background: #83c11f;
        border-radius: 25px;
        color: #fff;
        display: inline-block;
        font-weight: 500;
        margin-right: 13px;
        padding: 7px 27px 8px
    }

    .header__user .header__user-register:hover {
        background-color: #6ea21f
    }

    .header__user .icon-globe {
        position: relative;
        transition: all .3s ease
    }

    .header__user .icon-globe:hover {
        color: #83c11f
    }

    .header__user .icon-globe span {
        background: #1c232e;
        border-radius: 100%;
        color: #fff;
        font-size: 8px;
        height: 18px;
        left: 9px;
        padding: 4px;
        position: absolute;
        top: -11px;
        width: 18px
    }

    @media(max-width:976px) {
        .nav__dropdown--user-menu {
            height: calc(100vh - 28px)
        }

        .nav__dropdown--user-menu .mCSB_container {
            margin-right: 0 !important
        }
    }
    .aff-over {
        background: rgba(0, 0, 0, .4);
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9
    }

    @-webkit-keyframes rotation {
        0% {
            transform: rotateY(0deg)
        }

        50% {
            transform: rotateY(180deg)
        }

        to {
            transform: rotateY(1turn)
        }
    }

    @keyframes rotation {
        0% {
            transform: rotateY(0deg)
        }

        50% {
            transform: rotateY(180deg)
        }

        to {
            transform: rotateY(1turn)
        }
    }

    .q-aff {
        height: 32px;
        margin-right: 14px;
        padding-top: 1px;
        position: relative;
        width: 32px
    }

    .q-aff.q-aff--animate .coin {
        -webkit-animation-duration: 1.5s;
        animation-duration: 1.5s;
        -webkit-animation-iteration-count: 5;
        animation-iteration-count: 5;
        -webkit-animation-name: rotation;
        animation-name: rotation;
        -webkit-animation-timing-function: linear;
        animation-timing-function: linear;
        transform: rotateY(0deg);
        transform-style: preserve-3d
    }

    .q-aff .coin {
        background: #fff;
        border: 1px solid #f99d27;
        border-radius: 100%;
        cursor: pointer;
        display: block;
        font-size: 18px;
        font-weight: 700;
        height: 32px;
        position: relative;
        top: -.5px;
        transition: all .3s ease-in;
        width: 32px
    }

    .q-aff .coin>span {
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 50%;
        height: 100%;
        left: 0;
        position: absolute;
        top: 0;
        width: 100%
    }

    .q-aff .coin>span:nth-child(2) {
        transform: rotateY(180deg);
        z-index: 1
    }

    .q-aff .coin>span:after {
        color: #f99d27;
        content: "\e950";
        font-family: icomoon !important;
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%)
    }

    .q-aff .coin.coin--active,
    .q-aff .coin:hover {
        background: #f99d27;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .29)
    }

    .q-aff .coin.coin--active>span:after,
    .q-aff .coin:hover>span:after {
        color: #fff
    }

    .q-aff .coin.coin--active:before {
        opacity: 1;
        visibility: visible
    }

    .q-aff .coin:before {
        bottom: -14px;
        color: #b3bdc0;
        content: "\e959";
        font-family: icomoon !important;
        font-size: 8px;
        left: 50%;
        opacity: 0;
        position: absolute;
        transform: translate(-50%);
        visibility: hidden
    }

    @media(max-width:977px) {
        .q-aff {
            align-items: center;
            display: flex;
            justify-content: center;
            margin-right: 10px;
            padding-top: 0
        }

        .q-aff .coin {
            font-size: 14px;
            height: 24px;
            width: 24px
        }

        .q-aff .coin:before {
            display: none
        }

        body.aff-open .intercom-button,
        body.aff-open .intercom-launcher-frame,
        body.aff-open .intercom-lightweight-app-launcher {
            bottom: 250px !important
        }
    }

    .aff {
        align-content: flex-end;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-end;
        position: absolute;
        right: -20px;
        top: 62px
    }

    .aff .aff__message {
        align-items: center;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, .29);
        display: flex;
        margin-bottom: 10px;
        overflow: hidden;
        padding: 0 7px
    }

    .aff .aff__message.aff__message--not-affiliate {
        width: 464px
    }

    .aff .aff__message.aff__message--first-time {
        width: 520px
    }

    .aff .aff__message .aff__close {
        color: #465159;
        cursor: pointer;
        display: none;
        position: absolute;
        right: 17px;
        top: 17px
    }

    .aff .aff__message img {
        margin: 7px 12px 0 0
    }

    .aff .aff__message p {
        line-height: 21px;
        margin-bottom: 20px
    }

    .aff .aff__message .aff__btn {
        background: #f99d27;
        border-radius: 20px;
        color: #fff;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: 500;
        padding: 10.5px;
        text-align: center;
        width: 178px
    }

    .aff .aff__message .aff__btn:hover {
        background-color: #e38710
    }

    @media(max-width:977px) {
        .aff {
            right: -35px
        }

        .aff .aff__message {
            flex-direction: column;
            text-align: center
        }

        .aff .aff__message.aff__message--not-affiliate {
            left: 50%;
            padding: 24px 8px;
            position: fixed;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 272px
        }

        .aff .aff__message.aff__message--first-time {
            overflow: visible;
            padding: 24px 8px;
            position: relative;
            top: -7px;
            width: 312px
        }

        .aff .aff__message.aff__message--first-time:before {
            color: #fff;
            content: "\e959";
            font-family: icomoon !important;
            position: absolute;
            right: 37px;
            top: -14px;
            transform: rotate(180deg)
        }

        .aff .aff__message .aff__text {
            padding: 0 8px
        }

        .aff .aff__message .aff__close {
            display: inline-block
        }

        .aff .aff__message img {
            margin: 7px 12px 24px 0
        }
    }

    .header__user-info .new-profile-link,
    .header__user-info .new-profile-link.link--new h5 span:last-child,
    .header__user-info .new-profile-link.link--new span:last-child {
        position: relative
    }

    .header__user-info .new-profile-link.link--new h5 span:last-child:after,
    .header__user-info .new-profile-link.link--new span:last-child:after {
        top: -2px
    }

    .new-profile-link,
    .new-profile-link.link--new h5 span:last-child,
    .new-profile-link.link--new span:last-child,
    .new-resume-link,
    .new-resume-link.link--new h5 span:last-child,
    .new-resume-link.link--new span:last-child {
        position: relative
    }

    .new-profile-link.link--new h5 span:last-child:after,
    .new-profile-link.link--new span:last-child:after,
    .new-resume-link.link--new h5 span:last-child:after,
    .new-resume-link.link--new span:last-child:after {
        background: #0094c9;
        border-radius: 8px;
        color: #fff;
        content: "New";
        font-size: 12px;
        padding: 2px 6px;
        position: absolute;
        right: -46px;
        top: -11px
    }

    .new-profile-link.link--new h5 span:last-child:after,
    .new-resume-link.link--new h5 span:last-child:after {
        padding: 0 6px;
        right: -41px;
        top: -7px
    }

    .new-profile-link.link--new span:last-child,
    .new-resume-link.link--new span:last-child {
        height: 0;
        width: 0
    }

    .sidebar .new-profile-link.link--new span:last-child:after,
    .sidebar .new-resume-link.link--new span:last-child:after {
        top: -2px
    }

    .affiliates-header-link span {
        align-items: center;
        display: flex !important;
        justify-content: center
    }

    .affiliates-header-link span img {
        height: 20px
    }

    .nav__children {
        background: #f5f7f8;
        border-bottom-right-radius: 12px;
        border-top-right-radius: 12px;
        overflow: hidden;
        padding-bottom: 10px;
        position: absolute;
        right: 0;
        top: 0;
        transform: translate(100%);
        transition: all .3s ease-in;
        width: 0
    }

    .nav__children.nav__children--career {
        right: auto;
        top: auto;
        transform: none;
        width: auto
    }

    @media(min-width:992px) {
        .nav__children {
            height: 643px
        }

        .nav__children>div {
            height: 0;
            opacity: 0;
            visibility: hidden
        }

        .nav__children>div.open {
            height: auto;
            opacity: 1;
            visibility: visible
        }

        .nav__children>div.fast {
            transition: opacity .1s
        }

        .nav__children.open {
            width: 364px
        }
    }

    @media(max-width:991px) {

        .nav__children.open,
        .nav__children.open .nav__children-inner {
            width: 100%
        }
    }

    .nav__children.open.fast {
        transition: none
    }

    .nav__children .nav__children-inner {
        max-height: 644px;
        min-height: 644px;
        overflow: hidden;
        padding: 0 20px;
        width: 364px
    }

    .nav__children .nav__children-inner>a {
        border-bottom: 1px solid #e0e3e8;
        display: block;
        font-weight: 500;
        margin-bottom: 15px !important;
        padding: 17px 12px;
        text-decoration: underline
    }

    .nav__children .nav__children-inner>a span {
        position: relative
    }

    .nav__children .nav__children-inner>a span:before {
        content: "\e936";
        font-size: 19px;
        position: absolute;
        top: 0
    }

    .nav__children .nav__children-inner a {
        color: #1b232e;
        font-size: 14px;
        margin-bottom: 0
    }

    .nav__children .nav__children-inner a h6 {
        line-height: 20px;
        margin-bottom: 0
    }

    .nav__children .nav__children-inner a:hover {
        color: #0094c9
    }

    .nav__children .nav__children-sub>a {
        padding: 10px 12px
    }

    @media(min-width:992px) {
        .nav__children .nav__children-inner {
            padding: 0 0 0 20px
        }
    }

    @media(max-width:991px) {
        .nav__children {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
            z-index: 999
        }

        .nav__children.nav__children--career,
        .nav__children.nav__children--career .nav__children-inner {
            width: 100%
        }

        .nav__children .nav__children-inner {
            padding: 0
        }

        .nav__children .nav__children-inner .nav__children-bottom {
            align-items: center;
            border-bottom: 0;
            border-top: 1px solid #e0e3e8;
            color: #1794c9;
            display: flex !important;
            height: 60px;
            justify-content: center;
            padding: 0 24px !important
        }

        .nav__children .nav__children-inner .nav__children-bottom div {
            margin-left: 10px
        }

        .nav__children .nav__children-inner .nav__children-bottom div:before {
            text-decoration: none
        }

        .nav__children.open {
            transform: translate(0)
        }

        .nav__children .nav__children-top {
            align-items: center;
            border-bottom: 1px solid #eaeff4;
            display: flex;
            height: 53px;
            justify-content: space-between;
            padding: 10px 24px;
            position: relative
        }

        .nav__children .nav__children-top .child-nav-back {
            font-size: 16px
        }

        .nav__children .nav__children-top .child-nav-back span {
            margin-right: 10px
        }

        .nav__children .nav__children-top .child-nav-back span:before {
            color: #000;
            content: "\ea73";
            display: inline-block;
            position: relative;
            top: 1px;
            transform: rotate(-90deg)
        }

        .nav__children .nav__children-top a {
            color: #0094c9;
            padding: 0 !important;
            text-decoration: underline
        }

        .nav__children .nav__children-top a span {
            background: 0 0 !important;
            display: inline !important;
            height: auto !important;
            margin-right: 0 !important;
            padding: 0 !important;
            position: relative;
            width: auto !important
        }

        .nav__children .nav__children-top a span:before {
            left: -1px;
            position: absolute;
            top: 2px
        }

        .nav__children .nav__children-sub {
            max-height: calc(100vh - 200px);
            overflow: hidden;
            padding-bottom: 20px;
            padding-top: 10px
        }
    }

    .nav__dropdown.nav__dropdown--career {
        width: 412px
    }

    .nav__dropdown.nav__dropdown--career .nav__parent-categories {
        height: calc(100% - 77px);
        position: absolute;
        width: calc(100% - 8px)
    }

    .nav__dropdown.nav__dropdown--career .nav__categories.nav__categories--arrows .nav__parent:after {
        display: none
    }

    .nav__dropdown.nav__dropdown--career .nav__categories .nav__categories-parent:hover .nav__parent>span {
        background-color: #fff
    }

    .nav__dropdown.nav__dropdown--career .nav__categories .nav__categories-parent:hover h5,
    .nav__dropdown.nav__dropdown--career .nav__categories .nav__categories-parent:hover h5 span {
        color: #1794c9
    }

    .nav__dropdown.nav__dropdown--career .nav__categories .nav__parent>span {
        align-items: center;
        background-color: #eaeff4;
        border-radius: 100%;
        display: flex;
        height: 36px;
        justify-content: center;
        transition: all .3s ease-in;
        width: 36px
    }

    .nav__dropdown.nav__dropdown--career .nav__categories h5 span {
        color: #5d676e;
        font-size: 12px
    }

    .nav__dropdown.nav__dropdown--cats {
        width: 405px
    }

    .nav__dropdown.nav__dropdown--cats.open {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0
    }

    .nav__dropdown.nav__dropdown--cats {
        height: 643px
    }

    .nav__dropdown.nav__dropdown--career {
        height: 612px
    }

    .nav__dropdown.nav__dropdown--career,
    .nav__dropdown.nav__dropdown--cats {
        padding-left: 10px;
        padding-right: 10px
    }

    .nav__dropdown.nav__dropdown--career h4,
    .nav__dropdown.nav__dropdown--cats h4 {
        color: #b3bdc0;
        font-size: 12px;
        margin-bottom: 8px;
        padding: 0 14px;
        text-transform: uppercase
    }

    @media(min-width:992px) and (max-height:670px) {
        .nav__dropdown .nav__categories:not(.nav__categories--careers).nav__categories--arrows .nav__categories-inner {
            max-height: calc(100vh - 351px);
            overflow: hidden
        }
    }

    .nav__dropdown .nav__categories .nav__parent {
        align-items: center;
        cursor: pointer;
        display: flex;
        position: relative
    }

    .nav__dropdown .nav__categories .nav__parent h5 {
        font-size: 14px;
        font-weight: 500;
        margin: 0 15px 0 20px
    }

    .nav__dropdown .nav__categories .nav__parent img {
        width: 28px
    }

    .nav__dropdown .nav__categories.nav__categories--underline {
        margin-bottom: 24px;
        padding-bottom: 10px;
        position: relative
    }

    .nav__dropdown .nav__categories.nav__categories--underline a {
        display: block
    }

    .nav__dropdown .nav__categories.nav__categories--underline a:last-child {
        position: relative
    }

    .nav__dropdown .nav__categories.nav__categories--underline a:last-child .nav__parent:after {
        background-color: #eaeff4;
        bottom: -10px;
        content: "";
        height: 1px;
        left: 50%;
        position: absolute;
        transform: translate(-50%);
        width: 90%
    }

    .nav__dropdown .nav__categories.nav__categories--arrows .nav__parent:after {
        color: gray;
        content: "\e92f";
        font-family: icomoon;
        font-size: 14px;
        position: absolute;
        right: 14px;
        transform: rotate(-90deg)
    }

    .nav__dropdown .nav__categories .nav__categories-parent {
        display: block
    }

    .nav__dropdown .nav__categories .nav__categories-parent.open .nav__parent {
        background: #f5f7f8;
        color: #0094c9;
        font-weight: 700;
        transition: all .3s ease-in
    }

    .nav__dropdown .nav__categories .nav__categories-parent.open .nav__parent>span {
        font-weight: 500
    }

    .nav__dropdown .nav__categories .nav__categories-parent.open .nav__parent:before {
        opacity: 1
    }

    .nav__dropdown .nav__categories .nav__categories-parent.open .nav__parent:after {
        color: #0094c9
    }

    .nav__dropdown .nav__categories .nav__parent {
        padding: 8px 0 8px 20px
    }

    .nav__dropdown .nav__categories .nav__parent:before {
        background: #0094c9;
        border-bottom-left-radius: 5px;
        border-top-left-radius: 5px;
        content: "";
        height: 100%;
        left: 0;
        opacity: 0;
        position: absolute;
        transition: all .3s ease-in;
        width: 4px
    }

    .nav__dropdown .nav__categories .nav__parent.open,
    .nav__dropdown .nav__categories .nav__parent:hover {
        background: #f5f7f8;
        color: #0094c9;
        font-weight: 700;
        transition: all .3s ease-in
    }

    .nav__dropdown .nav__categories .nav__parent.open>span,
    .nav__dropdown .nav__categories .nav__parent:hover>span {
        font-weight: 500
    }

    .nav__dropdown .nav__categories .nav__parent.open:before,
    .nav__dropdown .nav__categories .nav__parent:hover:before {
        opacity: 1
    }

    .nav__dropdown .nav__categories .nav__parent.open:after,
    .nav__dropdown .nav__categories .nav__parent:hover:after {
        color: #0094c9
    }

    .nav__dropdown .nav__categories .nav__parent>span {
        color: #9fa4a8;
        font-size: 12px
    }

    .view_all_careers {
        color: #2d3941;
        font-size: 12px;
        font-weight: 700;
        position: absolute;
        right: 15px;
        text-decoration: underline;
        top: 21px
    }

    .view_all_careers .icon-thick-chevron-up {
        font-weight: 700;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%) rotate(90deg)
    }

    .view_all_careers .icon-thick-chevron-up:before {
        font-size: 10px
    }

    .hidden-form {
        left: -9999px;
        position: absolute;
        top: -9999px
    }

    .header__outer.free-lms-header .header__nav.nav,
    .header__outer.free-lms-header .header__search-input,
    .header__outer.free-lms-header .header__user .header__user-register,
    .header__outer.free-lms-header .header__user .nav__item--languages,
    .header__outer.free-lms-header .header__user .q-aff {
        display: none
    }

    .header__outer.free-lms-header .header__user .free-lms-get-started {
        border: 1px solid #6ea21f;
        border-radius: 20px;
        color: #6ea21f;
        font-size: 14px;
        font-weight: 500;
        padding: 8px 0;
        text-align: center;
        width: 124px
    }

    .header__outer.free-lms-header .header .header__search {
        width: 500px
    }

    .header__outer.free-lms-header .header .header__search #alison_logo {
        float: left
    }

    .header__outer.free-lms-header .free-lms-header {
        display: block !important;
        margin-top: 8px
    }

    .header__outer.free-lms-header .free-lms-header ul {
        align-items: center;
        display: flex;
        justify-content: space-between
    }

    .header__outer.free-lms-header .free-lms-header ul li {
        color: #465159;
        margin-right: 28px
    }

    .header__outer.free-lms-header .free-lms-header ul li a {
        color: #465159;
        font: normal normal normal 14px/21px Roboto, sans-serif
    }

    .header__outer.free-lms-header .free-lms-header ul li:hover {
        cursor: pointer
    }

    .header__outer.free-lms-header .free-lms-header ul li:first-child {
        margin-left: 15px
    }

    @media(max-width:992px) {
        .header__outer.free-lms-header ul.free-lms {
            display: none !important
        }

        .header__outer.free-lms-header .header .header__search {
            width: 100%
        }

        .header__outer.free-lms-header .header .header__search #alison_logo {
            float: none;
            margin: 0 auto;
            padding-top: 16px
        }

        .header__outer.free-lms-header .header__nav.nav {
            display: block
        }

        .header__outer.free-lms-header .header__user .login-mobile {
            margin-right: 0
        }

        .header__outer.free-lms-header .header__user .login-mobile span {
            background: url(/html/site/img/free-lms/login-icon.svg) no-repeat 50%;
            background-size: 16px 16px;
            height: 16px;
            margin-left: 6px;
            padding-left: 13px;
            width: 100px
        }

        .header__outer.free-lms-header .header__user .free-lms-get-started {
            display: none
        }
    }

</style>
<style>
    .login {
    background: #16222a;
    background: linear-gradient(90deg, #16222a 0, #3a6073);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#16222a",endColorstr="#3a6073",GradientType=1);
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
    .login-container .tabs > div {
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
    .login-container .tabs > div.active,
    .login-container .tabs > div:hover {
    background: #fff;
    }
    .login-container .tabs > div.active a,
    .login-container .tabs > div:hover a {
    color: #83c11f;
    font-weight: 500;
    }
    .login-container .tabs > div:hover {
    background: #f6f8fa;
    }
    .login-container .tabs > div.active {
    background: #fff;
    box-shadow: 0 -3px 6px rgba(210, 216, 222, 0.39);
    }
    .login-container .tabs > div a {
    color: #5d676e;
    display: block;
    padding: 11px 0 10px;
    transition: background 0.3s ease-in;
    }
    @media (max-width: 653px) {
    .login-container .tabs > div {
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
    .login-container [type="checkbox"]:checked + label:after {
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
    .login-container .tab > .icon-rocket {
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
    .login-container
    .form-group.social-signup
    .terms-conditions
    .errors
    .icon-error {
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
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:checked
    + label,
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:not(:checked)
    + label,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:checked
    + label,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:not(:checked)
    + label {
    display: block;
    font-size: 12px;
    margin-bottom: 11px;
    padding-left: 20px;
    }
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:checked
    + label:before,
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:not(:checked)
    + label:before,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:checked
    + label:before,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:not(:checked)
    + label:before {
    border-radius: 3px;
    height: 12px;
    left: 0;
    position: absolute;
    top: 1px;
    width: 12px;
    }
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:checked
    + label:after,
    .login-container
    .form-group
    .half-width.check
    [type="checkbox"]:not(:checked)
    + label:after,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:checked
    + label:after,
    .login-container
    .form-group
    .terms-conditions
    [type="checkbox"]:not(:checked)
    + label:after {
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
    .login-container .form-group .errors.terms-error + br {
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
    .login-container
    .form-group
    .input-field-email.has-error
    input::-webkit-input-placeholder,
    .login-container
    .form-group
    .input-field.has-error
    input::-webkit-input-placeholder {
    color: #f4254e;
    }
    .login-container
    .form-group
    .input-field-email.has-error
    input:-moz-placeholder,
    .login-container
    .form-group
    .input-field-email.has-error
    input::-moz-placeholder,
    .login-container .form-group .input-field.has-error input:-moz-placeholder,
    .login-container .form-group .input-field.has-error input::-moz-placeholder {
    color: #f4254e;
    }
    .login-container
    .form-group
    .input-field-email.has-error
    input:-ms-input-placeholder,
    .login-container
    .form-group
    .input-field.has-error
    input:-ms-input-placeholder {
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
    .login-container .login-inner > div {
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
    .login-container .login-inner > div {
        float: none;
        width: 100%;
    }
    .login-container .login-inner > div .signup-account {
        display: none;
    }
    .login-container .login-inner > div .social-login {
        margin-bottom: 36px;
    }
    .login-container .login-inner > div .form-group {
        padding-top: 27px !important;
    }
    .login-container .login-inner > div .login-form__submit {
        margin-top: 47px;
    }
    .login-container .login-inner > div .tc-check {
        font-size: 10px !important;
        padding-top: 3px;
    }
    .login-container .login-inner > div .tc-check a {
        font-size: 10px;
    }
    .login-container .login-inner .login-inner-left {
        padding: 40px 20px 0;
    }
    .login-container
        .login-inner
        .login-inner-left
        .social-login
        .social-login__link
        a {
        width: 100%;
    }
    .login-container
        .login-inner
        .login-inner-left
        .social-login
        .social-login__link
        a
        div {
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
    .login-container .tab > .icon-rocket {
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
    <body <?php body_class(); ?>>
    <div id="global" class="global">
    <?php get_template_part('mobile', 'sidebar'); ?>  

    <div class="pusher">
        <?php $fix = vibe_get_option('header_fix'); ?>
        <header class="arfixed">

<!--  -->

    <div class="header">
        <div class="header__search">
            <div class="for-mobile header__search-nav" style="display:none;">
                <span class="icon-nb-menu"></span>
                <span class="fa fa-search"></span>
            </div>
            <a href="/" id="alison_logo" class="logo">
                <img width="117" height="40" src="https://cdn01.alison-static.net/public/html/site/img/header/alison-free-courses.svg" alt="Free Online Courses, Classes and Tutorials">
            </a>
            <div class="header__search-input">
                <div class="search-container ">
                    <form method="£" action="#"id="header-search-form">
                        <input maxlength="200" autocomplete="off" placeholder="What do you want to learn?" class="autocomplete_field" id="autocomplete" name="query" type="text">
                        <button type="button" id="search_icon" class="btn btn-warning btn-fla"><span class="fa fa-search" style="pointer-events: none;"></span></button>
                    </form>
                </div>
            </div>
            <div class="free-lms-header" style="display: none;">
                <ul class="free-lms">
                    <li>
                        <a href="https://alison.com/free-lms-programme/#why-alison-lms"> Why Alison LMS </a>
                    </li>
                    <li>
                        <a href="https://alison.com/free-lms-programme/#certifications"> Certifications </a>
                    </li>
                    <li>
                        <a href="https://alison.com/free-lms-programme/#support"> Support </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="header__nav nav">
            <div class="for-desktop">
            <div class="nav__item nav__item--b nav__item--dropdown nav__item--hover">
                <a href="#" class="activate-dropdown" title="Explore Diplomas &amp; Certificates"><!-- onop - activated -->
                Explore Diplomas &amp; Certificates <span class="icon-dropdown"></span>
                </a>
                <div class="nav__dropdown nav__dropdown--cats nav__dropdown--cols nav__dropdown--visible" style="max-height: calc(100vh - 155px); display: none;"><!-- onoc - nav__dropdown--visible and style display none-->
                <h4>Course Types</h4>
                <div class="nav__categories nav__categories--underline">
                    <a href="https://alison.com/diploma-courses" title="Diploma
                    Courses">
                    <div class="nav__parent">
                        <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                        <h5>All Diploma Courses</h5>
                    </div>
                    </a>
                    <a href="https://alison.com/certificate-courses"
                    title="Certificates">
                    <div class="nav__parent">
                        <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                        <h5>All Certificate Courses</h5>
                    </div>
                    </a>
                    <a class="english-vertical-link"
                    href="https://alison.com/vertical/english" title="Learn English">
                    <div class="nav__parent">
                        <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                        <h5>Learn English</h5>
                    </div>
                    </a>
                </div>

                <h4>Course Categories</h4>
                <div class="nav__categories nav__categories--arrows">
                    <div class="nav__categories-inner mCustomScrollbar _mCS_1
                    mCS_no_scrollbar"><div id="mCSB_1" class="mCustomScrollBox mCS-3d
                        mCSB_vertical mCSB_inside" style="max-height: 0px;"
                        tabindex="0"><div id="mCSB_1_container" class="mCSB_container
                        mCS_y_hidden mCS_no_scrollbar_y" style="position:relative;
                        top:0; left:0;" dir="ltr">
                        <div class="nav__parent-categories mCustomScrollbar _mCS_2
                            mCS_no_scrollbar"><div id="mCSB_2" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_2_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr">
                                <a data-child="nav__children--it"
                                href="https://alison.com/courses/it"
                                class="nav__categories-parent" title="IT Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>IT</h5>
                                    <span>(924 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--health"
                                href="https://alison.com/courses/health"
                                class="nav__categories-parent" title="Health Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Health</h5>
                                    <span>(507 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--language"
                                href="https://alison.com/courses/language"
                                class="nav__categories-parent" title="Language
                                Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Language</h5>
                                    <span>(243 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--business"
                                href="https://alison.com/courses/business"
                                class="nav__categories-parent" title="Business
                                Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Business</h5>
                                    <span>(1305 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--management"
                                href="https://alison.com/courses/management"
                                class="nav__categories-parent" title="Management
                                Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Management</h5>
                                    <span>(754 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--personal-development"
                                href="https://alison.com/courses/personal-development"
                                class="nav__categories-parent" title="Personal
                                Development Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Personal Development</h5>
                                    <span>(818 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--marketing"
                                href="https://alison.com/courses/marketing"
                                class="nav__categories-parent" title="Sales &amp;
                                Marketing Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Sales &amp; Marketing</h5>
                                    <span>(288 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--engineering"
                                href="https://alison.com/courses/engineering"
                                class="nav__categories-parent" title="Engineering
                                &amp; Construction Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Engineering &amp; Construction</h5>
                                    <span>(655 Courses)</span>
                                </div>
                                </a>
                                <a data-child="nav__children--education"
                                href="https://alison.com/courses/education"
                                class="nav__categories-parent" title="Teaching &amp;
                                Academics Courses">
                                <div class="nav__parent">
                                    <img class="lazyload mCS_img_loaded" src="<?php echo get_template_directory_uri() . '/assets/images/menus/it-courses.svg'; ?>" title="IT Courses">
                                    <h5>Teaching &amp; Academics</h5>
                                    <span>(1068 Courses)</span>
                                </div>
                                </a>
                            </div><div id="mCSB_2_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_2_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_2_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div>
                        </div><div id="mCSB_1_scrollbar_vertical"
                        class="mCSB_scrollTools mCSB_1_scrollbar mCS-3d
                        mCSB_scrollTools_vertical" style="display: none;"><div
                            class="mCSB_draggerContainer"><div
                            id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                            style="position: absolute; min-height: 70px; top: 0px;"><div
                                class="mCSB_dragger_bar" style="line-height: 70px;"></div></div><div
                            class="mCSB_draggerRail"></div></div></div></div></div>
                    <div class="nav__children" style="max-height: calc(100vh - 102px);">
                    <div class="nav__children--it">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/it" title="IT Courses">
                            View Top IT Courses <span class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_6
                            mCS_no_scrollbar"><div id="mCSB_6" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_6_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/network-and-security"
                                title="Network Security Courses">
                                <h6>Network Security</h6>
                                </a><a
                                href="https://alison.com/courses/software-development"
                                title="Programming Courses">
                                <h6>Programming</h6>
                                </a><a href="https://alison.com/courses/software-tools"
                                title="Information Systems Courses">
                                <h6>Information Systems</h6>
                                </a><a href="https://alison.com/courses/it-management"
                                title="Management Courses">
                                <h6>Management</h6>
                                </a><a
                                href="https://alison.com/courses/software-engineering"
                                title="Engineering Courses">
                                <h6>Engineering</h6>
                                </a><a href="https://alison.com/courses/data-science"
                                title="Data Science Courses">
                                <h6>Data Science</h6>
                                </a><a href="https://alison.com/courses/databases"
                                title="Databases Courses">
                                <h6>Databases</h6>
                                </a><a
                                href="https://alison.com/courses/it/administration"
                                title="Administration Courses">
                                <h6>Administration</h6>
                                </a><a href="https://alison.com/courses/it/aws"
                                title="AWS Courses">
                                <h6>AWS</h6>
                                </a><a
                                href="https://alison.com/courses/it/business-management"
                                title="Business Management Courses">
                                <h6>Business Management</h6>
                                </a><a href="https://alison.com/courses/it/ccna"
                                title="CCNA Courses">
                                <h6>CCNA</h6>
                                </a><a href="https://alison.com/courses/it/comptia"
                                title="Comptia Courses">
                                <h6>Comptia</h6>
                                </a><a
                                href="https://alison.com/courses/it/computer-networking"
                                title="Computer Networking Courses">
                                <h6>Computer Networking</h6>
                                </a><a
                                href="https://alison.com/courses/it/cryptocurrency"
                                title="Cryptocurrency Courses">
                                <h6>Cryptocurrency</h6>
                                </a><a
                                href="https://alison.com/courses/it/data-security"
                                title="Data Security Courses">
                                <h6>Data Security</h6>
                                </a><a href="https://alison.com/courses/it/devops"
                                title="DevOps Courses">
                                <h6>DevOps</h6>
                                </a><a href="https://alison.com/courses/it/microsoft"
                                title="Microsoft Courses">
                                <h6>Microsoft</h6>
                                </a><a href="https://alison.com/courses/it/security"
                                title="Security Courses">
                                <h6>Security</h6>
                                </a><a href="https://alison.com/courses/it/server"
                                title="Server Courses">
                                <h6>Server</h6>
                                </a><a
                                href="https://alison.com/courses/it/small-business"
                                title="Small Business Courses">
                                <h6>Small Business</h6>
                                </a></div><div id="mCSB_6_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_6_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_6_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--health">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/health" title="Health
                            Courses">
                            View Top Health Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_7
                            mCS_no_scrollbar"><div id="mCSB_7" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_7_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/mental-health"
                                title="Mental Health Courses">
                                <h6>Mental Health</h6>
                                </a><a href="https://alison.com/courses/health-care"
                                title="Healthcare Courses">
                                <h6>Healthcare</h6>
                                </a><a href="https://alison.com/courses/nursing"
                                title="Nursing Courses">
                                <h6>Nursing</h6>
                                </a><a href="https://alison.com/courses/caregiving"
                                title="Caregiving Courses">
                                <h6>Caregiving</h6>
                                </a><a href="https://alison.com/courses/nutrition"
                                title="Nutrition Courses">
                                <h6>Nutrition</h6>
                                </a><a
                                href="https://alison.com/courses/food-and-beverage"
                                title="Food Safety Courses">
                                <h6>Food Safety</h6>
                                </a><a href="https://alison.com/courses/pharmacology"
                                title="Pharmacology Courses">
                                <h6>Pharmacology</h6>
                                </a><a href="https://alison.com/courses/health/dementia"
                                title="Dementia Courses">
                                <h6>Dementia</h6>
                                </a><a
                                href="https://alison.com/courses/health/disability"
                                title="Disability Courses">
                                <h6>Disability</h6>
                                </a><a
                                href="https://alison.com/courses/health/health-and-fitness"
                                title="Health And Fitness Courses">
                                <h6>Health And Fitness</h6>
                                </a><a href="https://alison.com/courses/health/hygiene"
                                title="Hygiene Courses">
                                <h6>Hygiene</h6>
                                </a><a
                                href="https://alison.com/courses/health/management"
                                title="Management Courses">
                                <h6>Management</h6>
                                </a><a
                                href="https://alison.com/courses/health/physical-therapy"
                                title="Physical Therapy Courses">
                                <h6>Physical Therapy</h6>
                                </a><a
                                href="https://alison.com/courses/health/physiology"
                                title="Physiology Courses">
                                <h6>Physiology</h6>
                                </a><a
                                href="https://alison.com/courses/health/physiotherapy"
                                title="Physiotherapy Courses">
                                <h6>Physiotherapy</h6>
                                </a><a
                                href="https://alison.com/courses/health/substance-abuse"
                                title="Substance Abuse Courses">
                                <h6>Substance Abuse</h6>
                                </a><a href="https://alison.com/courses/health/therapy"
                                title="Therapy Courses">
                                <h6>Therapy</h6>
                                </a><a href="https://alison.com/courses/health/trauma"
                                title="Trauma Courses">
                                <h6>Trauma</h6>
                                </a></div><div id="mCSB_7_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_7_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_7_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--language">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/language" title="Language
                            Courses">
                            View Top Language Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_8
                            mCS_no_scrollbar"><div id="mCSB_8" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_8_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/tag/english-language"
                                title="English Language Courses">
                                <h6>English Language</h6>
                                </a><a href="https://alison.com/courses/spanish"
                                title="Spanish Language Courses">
                                <h6>Spanish Language</h6>
                                </a><a href="https://alison.com/courses/german"
                                title="German Language Courses">
                                <h6>German Language</h6>
                                </a><a href="https://alison.com/courses/irish"
                                title="Irish Language Courses">
                                <h6>Irish Language</h6>
                                </a><a href="https://alison.com/courses/french"
                                title="French Language Courses">
                                <h6>French Language</h6>
                                </a><a href="https://alison.com/courses/chinese"
                                title="Chinese Language Courses">
                                <h6>Chinese Language</h6>
                                </a><a href="https://alison.com/courses/swedish"
                                title="Swedish Language Courses">
                                <h6>Swedish Language</h6>
                                </a><a href="https://alison.com/courses/japanese"
                                title="Japanese Language Courses">
                                <h6>Japanese Language</h6>
                                </a><a
                                href="https://alison.com/courses/language/business-english"
                                title="Business English Courses">
                                <h6>Business English</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-conversation"
                                title="English Conversation Courses">
                                <h6>English Conversation</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-for-stem"
                                title="English For Stem Courses">
                                <h6>English For Stem</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-literature"
                                title="English Literature Courses">
                                <h6>English Literature</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-pronunciation"
                                title="English Pronunciation Courses">
                                <h6>English Pronunciation</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-vocabulary"
                                title="English Vocabulary Courses">
                                <h6>English Vocabulary</h6>
                                </a><a
                                href="https://alison.com/courses/language/english-writing"
                                title="English Writing Courses">
                                <h6>English Writing</h6>
                                </a><a
                                href="https://alison.com/courses/language/front-desk"
                                title="Front Desk Courses">
                                <h6>Front Desk</h6>
                                </a><a href="https://alison.com/courses/language/tesl"
                                title="TESL Courses">
                                <h6>TESL</h6>
                                </a><a href="https://alison.com/courses/language/travel"
                                title="Travel Courses">
                                <h6>Travel</h6>
                                </a></div><div id="mCSB_8_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_8_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_8_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--business">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/business" title="Business
                            Courses">
                            View Top Business Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_9
                            mCS_no_scrollbar"><div id="mCSB_9" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_9_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/human-resources"
                                title="Human Resources Courses">
                                <h6>Human Resources</h6>
                                </a><a href="https://alison.com/courses/operations"
                                title="Operations Courses">
                                <h6>Operations</h6>
                                </a><a
                                href="https://alison.com/courses/supply-chain-management"
                                title="Supply Chain Management Courses">
                                <h6>Supply Chain Management</h6>
                                </a><a
                                href="https://alison.com/courses/customer-service"
                                title="Customer Service Courses">
                                <h6>Customer Service</h6>
                                </a><a href="https://alison.com/courses/manufacturing"
                                title="Manufacturing Courses">
                                <h6>Manufacturing</h6>
                                </a><a
                                href="https://alison.com/courses/health-and-safety"
                                title="Health And Safety Courses">
                                <h6>Health And Safety</h6>
                                </a><a href="https://alison.com/courses/quality-control"
                                title="Quality Management Courses">
                                <h6>Quality Management</h6>
                                </a><a href="https://alison.com/courses/e-commerce"
                                title="E-commerce Courses">
                                <h6>E-commerce</h6>
                                </a><a
                                href="https://alison.com/courses/leadership-and-management"
                                title="Management Courses">
                                <h6>Management</h6>
                                </a><a href="https://alison.com/courses/sales"
                                title="Sales Courses">
                                <h6>Sales</h6>
                                </a><a href="https://alison.com/courses/accounting"
                                title="Accounting Courses">
                                <h6>Accounting</h6>
                                </a><a
                                href="https://alison.com/courses/tourism-and-hospitality"
                                title="Hospitality Courses">
                                <h6>Hospitality</h6>
                                </a><a href="https://alison.com/courses/communications"
                                title="Communication Skills Courses">
                                <h6>Communication Skills</h6>
                                </a><a
                                href="https://alison.com/courses/business/auditing"
                                title="Auditing Courses">
                                <h6>Auditing</h6>
                                </a><a href="https://alison.com/courses/business/iso"
                                title="ISO Courses">
                                <h6>ISO</h6>
                                </a><a
                                href="https://alison.com/courses/business/marketing"
                                title="Marketing Courses">
                                <h6>Marketing</h6>
                                </a><a
                                href="https://alison.com/courses/business/microsoft"
                                title="Microsoft Courses">
                                <h6>Microsoft</h6>
                                </a><a
                                href="https://alison.com/courses/business/motivation"
                                title="Motivation Courses">
                                <h6>Motivation</h6>
                                </a><a
                                href="https://alison.com/courses/business/productivity"
                                title="Productivity Courses">
                                <h6>Productivity</h6>
                                </a></div><div id="mCSB_9_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_9_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_9_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--management">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/management"
                            title="Management Courses">
                            View Top Management Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_10
                            mCS_no_scrollbar"><div id="mCSB_10" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_10_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/business-process-management"
                                title="Operations Courses">
                                <h6>Operations</h6>
                                </a><a
                                href="https://alison.com/courses/finances-and-banking"
                                title="Accounting Courses">
                                <h6>Accounting</h6>
                                </a><a
                                href="https://alison.com/courses/workplace-supervision"
                                title="Supervision Courses">
                                <h6>Supervision</h6>
                                </a><a
                                href="https://alison.com/courses/management/auditing"
                                title="Auditing Courses">
                                <h6>Auditing</h6>
                                </a><a
                                href="https://alison.com/courses/management/health-and-safety"
                                title="Health and Safety Courses">
                                <h6>Health and Safety</h6>
                                </a><a
                                href="https://alison.com/courses/management/human-resources"
                                title="Human Resources Courses">
                                <h6>Human Resources</h6>
                                </a><a href="https://alison.com/courses/management/iso"
                                title="ISO Courses">
                                <h6>ISO</h6>
                                </a><a href="https://alison.com/courses/management/lean"
                                title="Lean Courses">
                                <h6>Lean</h6>
                                </a><a
                                href="https://alison.com/courses/management/manufacturing"
                                title="Manufacturing Courses">
                                <h6>Manufacturing</h6>
                                </a><a
                                href="https://alison.com/courses/management/motivation"
                                title="Motivation Courses">
                                <h6>Motivation</h6>
                                </a><a
                                href="https://alison.com/courses/management/nursing"
                                title="Nursing Courses">
                                <h6>Nursing</h6>
                                </a><a
                                href="https://alison.com/courses/management/productivity"
                                title="Productivity Courses">
                                <h6>Productivity</h6>
                                </a><a
                                href="https://alison.com/courses/management/project-management"
                                title="Project Management Courses">
                                <h6>Project Management</h6>
                                </a><a
                                href="https://alison.com/courses/management/quality-management"
                                title="Quality Management Courses">
                                <h6>Quality Management</h6>
                                </a><a
                                href="https://alison.com/courses/management/retail"
                                title="Retail Courses">
                                <h6>Retail</h6>
                                </a><a
                                href="https://alison.com/courses/management/supply-chain-management"
                                title="Supply Chain Management Courses">
                                <h6>Supply Chain Management</h6>
                                </a></div><div id="mCSB_10_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_10_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_10_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--personal-development">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/personal-development"
                            title="Personal Development Courses">
                            View Top Personal Development Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_11
                            mCS_no_scrollbar"><div id="mCSB_11" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_11_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/fitness"
                                title="Fitness Courses">
                                <h6>Fitness</h6>
                                </a><a href="https://alison.com/courses/psychology"
                                title="Psychology Courses">
                                <h6>Psychology</h6>
                                </a><a href="https://alison.com/courses/finance"
                                title="Finance Courses">
                                <h6>Finance</h6>
                                </a><a href="https://alison.com/courses/music"
                                title="Music Courses">
                                <h6>Music</h6>
                                </a><a href="https://alison.com/courses/photography"
                                title="Photography Courses">
                                <h6>Photography</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/anxiety"
                                title="Anxiety Courses">
                                <h6>Anxiety</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/communication-skills"
                                title="Communication Skills Courses">
                                <h6>Communication Skills</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/depression"
                                title="Depression Courses">
                                <h6>Depression</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/diet"
                                title="Diet Courses">
                                <h6>Diet</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/dslr"
                                title="DSLR Courses">
                                <h6>DSLR</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/health"
                                title="Health Courses">
                                <h6>Health</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/mental-health"
                                title="Mental Health Courses">
                                <h6>Mental Health</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/mindset"
                                title="Mindset Courses">
                                <h6>Mindset</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/motivation"
                                title="Motivation Courses">
                                <h6>Motivation</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/positive-psychology"
                                title="Positive Psychology Courses">
                                <h6>Positive Psychology</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/stress-management"
                                title="Stress Management Courses">
                                <h6>Stress Management</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/therapy"
                                title="Therapy Courses">
                                <h6>Therapy</h6>
                                </a><a
                                href="https://alison.com/courses/personal-development/time-management"
                                title="Time Management Courses">
                                <h6>Time Management</h6>
                                </a></div><div id="mCSB_11_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_11_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_11_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--marketing">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/marketing" title="Sales
                            &amp; Marketing Courses">
                            View Top Sales &amp; Marketing Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_12
                            mCS_no_scrollbar"><div id="mCSB_12" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_12_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/entrepreneurship"
                                title="Entrepreneurship Courses">
                                <h6>Entrepreneurship</h6>
                                </a><a
                                href="https://alison.com/courses/marketing-management"
                                title="Management Courses">
                                <h6>Management</h6>
                                </a><a
                                href="https://alison.com/courses/digital-marketing"
                                title="Digital Marketing Courses">
                                <h6>Digital Marketing</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/advertising"
                                title="Advertising Courses">
                                <h6>Advertising</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/amazon"
                                title="Amazon Courses">
                                <h6>Amazon</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/content-marketing"
                                title="Content Marketing Courses">
                                <h6>Content Marketing</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/data-security"
                                title="Data Security Courses">
                                <h6>Data Security</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/ethics"
                                title="Ethics Courses">
                                <h6>Ethics</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/market-research"
                                title="Market Research Courses">
                                <h6>Market Research</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/marketing-strategy"
                                title="Marketing Strategy Courses">
                                <h6>Marketing Strategy</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/presentation-skills"
                                title="Presentation Skills Courses">
                                <h6>Presentation Skills</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/product-marketing"
                                title="Product Marketing Courses">
                                <h6>Product Marketing</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/retail"
                                title="Retail Courses">
                                <h6>Retail</h6>
                                </a><a href="https://alison.com/courses/marketing/sales"
                                title="Sales Courses">
                                <h6>Sales</h6>
                                </a><a
                                href="https://alison.com/courses/marketing/social-media"
                                title="Social Media Courses">
                                <h6>Social Media</h6>
                                </a></div><div id="mCSB_12_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_12_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_12_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--engineering">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/engineering"
                            title="Engineering &amp; Construction Courses">
                            View Top Engineering &amp; Construction Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_13
                            mCS_no_scrollbar"><div id="mCSB_13" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_13_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/risk-management"
                                title="Risk Management Courses">
                                <h6>Risk Management</h6>
                                </a><a href="https://alison.com/courses/skilled-trades"
                                title="Construction Courses">
                                <h6>Construction</h6>
                                </a><a href="https://alison.com/courses/electrical"
                                title="Electrical Engineering Courses">
                                <h6>Electrical Engineering</h6>
                                </a><a href="https://alison.com/courses/carpentry"
                                title="Carpentry Courses">
                                <h6>Carpentry</h6>
                                </a><a href="https://alison.com/courses/motor"
                                title="Automotive Engineering Courses">
                                <h6>Automotive Engineering</h6>
                                </a><a
                                href="https://alison.com/courses/critical-operations"
                                title="Operations Courses">
                                <h6>Operations</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/auditing"
                                title="Auditing Courses">
                                <h6>Auditing</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/compliance"
                                title="Compliance Courses">
                                <h6>Compliance</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/engineering"
                                title="Engineering Courses">
                                <h6>Engineering</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/health-and-safety"
                                title="Health And Safety Courses">
                                <h6>Health And Safety</h6>
                                </a><a href="https://alison.com/courses/engineering/iso"
                                title="ISO Courses">
                                <h6>ISO</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/kaizen"
                                title="Kaizen Courses">
                                <h6>Kaizen</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/kanban"
                                title="Kanban Courses">
                                <h6>Kanban</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/lean"
                                title="Lean Courses">
                                <h6>Lean</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/management"
                                title="Management Courses">
                                <h6>Management</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/manufacturing"
                                title="Manufacturing Courses">
                                <h6>Manufacturing</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/quality-management"
                                title="Quality Management Courses">
                                <h6>Quality Management</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/renewable-energy"
                                title="Renewable Energy Courses">
                                <h6>Renewable Energy</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/six-sigma"
                                title="Six Sigma Courses">
                                <h6>Six Sigma</h6>
                                </a><a
                                href="https://alison.com/courses/engineering/supply-chain-management"
                                title="Supply Chain Management Courses">
                                <h6>Supply Chain Management</h6>
                                </a></div><div id="mCSB_13_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_13_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_13_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    <div class="nav__children--education">
                        <div class="nav__children-inner">
                        <a href="https://alison.com/courses/education" title="Teaching
                            &amp; Academics Courses">
                            View Top Teaching &amp; Academics Courses <span
                            class="icon-thick-arrow-right"></span>
                        </a>
                        <div class="nav__children-sub mCustomScrollbar _mCS_14
                            mCS_no_scrollbar"><div id="mCSB_14" class="mCustomScrollBox
                            mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                            tabindex="0"><div id="mCSB_14_container"
                                class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                                style="position:relative; top:0; left:0;" dir="ltr"><a
                                href="https://alison.com/courses/science"
                                title="Science Courses">
                                <h6>Science</h6>
                                </a><a href="https://alison.com/courses/history"
                                title="History Courses">
                                <h6>History</h6>
                                </a><a href="https://alison.com/courses/geography"
                                title="Geography Courses">
                                <h6>Geography</h6>
                                </a><a href="https://alison.com/courses/law" title="Law
                                Courses">
                                <h6>Law</h6>
                                </a><a
                                href="https://alison.com/courses/media-and-journalism"
                                title="Journalism Courses">
                                <h6>Journalism</h6>
                                </a><a href="https://alison.com/courses/economics"
                                title="Economics Courses">
                                <h6>Economics</h6>
                                </a><a href="https://alison.com/courses/math"
                                title="Mathematics Courses">
                                <h6>Mathematics</h6>
                                </a><a href="https://alison.com/courses/literature"
                                title="Literature Courses">
                                <h6>Literature</h6>
                                </a><a
                                href="https://alison.com/courses/education/adult-education"
                                title="Adult Education Courses">
                                <h6>Adult Education</h6>
                                </a><a
                                href="https://alison.com/courses/education/architecture"
                                title="Architecture Courses">
                                <h6>Architecture</h6>
                                </a><a
                                href="https://alison.com/courses/education/classroom-management"
                                title="Classroom Management Courses">
                                <h6>Classroom Management</h6>
                                </a><a
                                href="https://alison.com/courses/education/climate-change"
                                title="Climate Change Courses">
                                <h6>Climate Change</h6>
                                </a><a
                                href="https://alison.com/courses/education/educational-psychology"
                                title="Educational Psychology Courses">
                                <h6>Educational Psychology</h6>
                                </a><a
                                href="https://alison.com/courses/education/human-anatomy"
                                title="Human Anatomy Courses">
                                <h6>Human Anatomy</h6>
                                </a><a
                                href="https://alison.com/courses/education/motivation"
                                title="Motivation Courses">
                                <h6>Motivation</h6>
                                </a><a
                                href="https://alison.com/courses/education/music-theory"
                                title="Music Theory Courses">
                                <h6>Music Theory</h6>
                                </a><a
                                href="https://alison.com/courses/education/psychology"
                                title="Psychology Courses">
                                <h6>Psychology</h6>
                                </a><a
                                href="https://alison.com/courses/education/teaching"
                                title="Teaching Courses">
                                <h6>Teaching</h6>
                                </a><a
                                href="https://alison.com/courses/education/writing-skills"
                                title="Writing Skills Courses">
                                <h6>Writing Skills</h6>
                                </a></div><div id="mCSB_14_scrollbar_vertical"
                                class="mCSB_scrollTools mCSB_14_scrollbar mCS-3d
                                mCSB_scrollTools_vertical" style="display: none;"><div
                                class="mCSB_draggerContainer"><div
                                    id="mCSB_14_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 70px; top:
                                    0px;"><div class="mCSB_dragger_bar"
                                    style="line-height: 70px;"></div></div><div
                                    class="mCSB_draggerRail"></div></div></div></div></div></div></div>
                    </div>
                </div>

                </div>

            </div>
            <span class="nav__item claim-your-certs">
                <a href="https://alison.com/shop" title="Claim Your Certificates">
                Claim Your Certificates </a>
            </span>
            <div class="nav__item nav__item--b nav__item--dropdown nav__item--hover">
                <a href="#" class="activate-dropdown" title="Discover Careers"> <!--onoc-->
                Discover Careers <span class="fa fa-long-arrow-down"></span>
                </a>
                <div class="nav__dropdown nav__dropdown--career nav__dropdown--cols nav__dropdown--visible" style="display: none; max-height: calc(100vh - 102px);"> <!--onop-->
                <h4>EXPLORE CAREER CATEGORIES</h4>
                <div class="nav__categories nav__categories--careers
                    nav__categories--arrows">
                    <div class="nav__categories-inner">
                    <a class="view_all_careers" href="https://alison.com/careers"
                        title="View All Categories">
                        View All Categories <span class="icon-thick-chevron-up"></span>
                    </a>
                    <div class="nav__parent-categories mCustomScrollbar _mCS_3
                        mCS_no_scrollbar"><div id="mCSB_3" class="mCustomScrollBox
                        mCS-3d mCSB_vertical mCSB_inside" style="max-height: 0px;"
                        tabindex="0"><div id="mCSB_3_container" class="mCSB_container
                            mCS_y_hidden mCS_no_scrollbar_y" style="position:relative;
                            top:0; left:0;" dir="ltr">
                            <a href="https://alison.com/careers/health"
                            class="nav__categories-parent" title="Health Science
                            Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/health.svg"
                                    title="Health Science Careers">
                                </span>
                                <h5>Health Science <br> <span>131 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/finance"
                            class="nav__categories-parent" title="Finance Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/finance.svg"
                                    title="Finance Careers">
                                </span>
                                <h5>Finance <br> <span>42 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/it"
                            class="nav__categories-parent" title="Information
                            Technology Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/it.svg"
                                    title="Information Technology Careers">
                                </span>
                                <h5>Information Technology <br> <span>37 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/education"
                            class="nav__categories-parent" title="Education and
                            Training Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/education.svg"
                                    title="Education and Training Careers">
                                </span>
                                <h5>Education and Training <br> <span>54 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/management"
                            class="nav__categories-parent" title="Business Management
                            and Administration Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/management.svg"
                                    title="Business Management and Administration
                                    Careers">
                                </span>
                                <h5>Business Management and Administration <br> <span>50
                                    Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/marketing"
                            class="nav__categories-parent" title="Marketing, Sales,
                            and Service Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/marketing.svg"
                                    title="Marketing, Sales, and Service Careers">
                                </span>
                                <h5>Marketing, Sales, and Service <br> <span>39 Careers</span></h5>
                            </div>
                            </a>
                            <a
                            href="https://alison.com/careers/agriculture-food-and-natural-resources"
                            class="nav__categories-parent" title="Agriculture, Food,
                            and Natural Resources Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/agriculture-food-and-natural-resources.svg"
                                    title="Agriculture, Food, and Natural Resources
                                    Careers">
                                </span>
                                <h5>Agriculture, Food, and Natural Resources <br> <span>45
                                    Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/hospitality"
                            class="nav__categories-parent" title="Hospitality and
                            Tourism Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/hospitality.svg"
                                    title="Hospitality and Tourism Careers">
                                </span>
                                <h5>Hospitality and Tourism <br> <span>15 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/stem"
                            class="nav__categories-parent" title="Science, Technology,
                            Engineering, and Mathematics Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/stem.svg"
                                    title="Science, Technology, Engineering, and
                                    Mathematics Careers">
                                </span>
                                <h5>Science, Technology, Engineering, and Mathematics
                                <br> <span>105 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/architecture"
                            class="nav__categories-parent" title="Architecture and
                            Construction Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/architecture.svg"
                                    title="Architecture and Construction Careers">
                                </span>
                                <h5>Architecture and Construction <br> <span>33 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/government"
                            class="nav__categories-parent" title="Government and
                            Public Administration Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/government.svg"
                                    title="Government and Public Administration
                                    Careers">
                                </span>
                                <h5>Government and Public Administration <br> <span>14
                                    Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/security"
                            class="nav__categories-parent" title="Law, Public Safety,
                            Corrections, and Security Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/security.svg"
                                    title="Law, Public Safety, Corrections, and Security
                                    Careers">
                                </span>
                                <h5>Law, Public Safety, Corrections, and Security <br>
                                <span>66 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/manufacturing"
                            class="nav__categories-parent" title="Manufacturing
                            Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/manufacturing.svg"
                                    title="Manufacturing Careers">
                                </span>
                                <h5>Manufacturing <br> <span>12 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/distribution"
                            class="nav__categories-parent" title="Transportation,
                            Distribution, and Logistics Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/distribution.svg"
                                    title="Transportation, Distribution, and Logistics
                                    Careers">
                                </span>
                                <h5>Transportation, Distribution, and Logistics <br>
                                <span>31 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/human-services"
                            class="nav__categories-parent" title="Human Services
                            Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/human-services.svg"
                                    title="Human Services Careers">
                                </span>
                                <h5>Human Services <br> <span>62 Careers</span></h5>
                            </div>
                            </a>
                            <a href="https://alison.com/careers/arts"
                            class="nav__categories-parent" title="Arts, Audio/Video
                            Technology, and Communications Careers">
                            <div class="nav__parent">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/arts.svg"
                                    title="Arts, Audio/Video Technology, and
                                    Communications Careers">
                                </span>
                                <h5>Arts, Audio/Video Technology, and Communications
                                <br> <span>92 Careers</span></h5>
                            </div>
                            </a>
                        </div><div id="mCSB_3_scrollbar_vertical"
                            class="mCSB_scrollTools mCSB_3_scrollbar mCS-3d
                            mCSB_scrollTools_vertical" style="display: none;"><div
                            class="mCSB_draggerContainer"><div
                                id="mCSB_3_dragger_vertical" class="mCSB_dragger"
                                style="position: absolute; min-height: 70px; top: 0px;"><div
                                class="mCSB_dragger_bar" style="line-height: 70px;"></div></div><div
                                class="mCSB_draggerRail"></div></div></div></div></div>
                    </div>
                </div>

                </div>

            </div>
            <span class="nav__item nav__item--dropdown nav__item--hover nav__item--animation">
                <a href="#" class="activate-dropdown" title="More">More <span class="icon-dropdown"></span></a> <!-- onop -->
                <div class="nav__dropdown nav__dropdown--visible" style="display: none"> <!-- onoc -->
                <a href="https://alison.com/careers" class="nav__dropdown-button nav__dropdown-button-certs" title="Claim Your Certificates" style="display: none">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/certification.svg"
                    title="Claim Your Certificates">
                    <h5>Claim Your Certificates</h5>
                    <span>Get Certified now</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/careers" class="nav__dropdown-button
                    nav__dropdown-button-careers" title="Discover Careers"
                    style="display: none">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/alison-for-business.svg"
                    title="Discover Careers">
                    <h5>Discover Careers</h5>
                    <span>See Your Future</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/psychometric-test/personality"
                    class="nav__dropdown-button" title="Workplace Personality
                    Assessment">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/wpa.svg"
                    title="Discover Your Strengths &amp; Weaknesses">
                    <h5>Workplace Personality Assessment</h5>
                    <span>Discover Your Strengths &amp; Weaknesses</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/psychometric-test/wellbeing"
                    class="nav__dropdown-button" title="Mental Health Assessment">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/mental-health-assessment.svg"
                    title="Mental Health Assessment">
                    <h5>Mental Health Assessment</h5>
                    <span>Assess Your Mental Wellbeing</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/cv?source=top-nav-bar"
                    class="nav__dropdown-button new-resume-link" title="Resumé Builder">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/resume-builder.svg"
                    title="Resumé Builder">
                    <h5>Resumé Builder <span></span></h5>
                    <span>Create Your Professional Resumé</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://blog.alison.com" target="_blank"
                    class="nav__dropdown-button" title="Alison Blog">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/alison-blog.svg"
                    title="Alison Blog">
                    <h5>Alison Blog</h5>
                    <span>News, Insights, Tips And Stories From Alison</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/business/contact-us"
                    class="nav__dropdown-button nav__dropdown-button-business"
                    title="Alison For Business">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/alison-for-business.svg"
                    title="Alison For Business">
                    <h5>Alison For Business</h5>
                    <span>Upskill Your Employees</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/about/gopremium"
                    class="nav__dropdown-button" title="Get Alison Premium">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/premium.svg"
                    title="Get Alison Premium">
                    <h5>Get Alison Premium</h5>
                    <span>Remove Ads</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                <a href="https://alison.com/mobile/online-learning-app"
                    class="nav__dropdown-button" title="Download the Alison App">
                    <img class="lazyload"
                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/mobile-app.svg"
                    title="Get Alison Premium">
                    <h5>Download the Alison App</h5>
                    <span>Learn anywhere, anytime for free</span>
                    <svg class="border">
                    <rect width="100%" height="100%" rx="12"></rect>
                    </svg>
                </a>
                </div>

            </span>
            </div>

            <div class="for-mobile" style="display: none">
            <span class="nav__item nav__item--dropdown nav__item--user-menu">
                <div class="nav__dropdown nav__dropdown--user-menu nav__dropdown--scroll
                mCustomScrollbar _mCS_4 mCS_no_scrollbar active" style="display: none;"><div
                    id="mCSB_4" class="mCustomScrollBox mCS-3d mCSB_vertical
                    mCSB_inside" style="max-height: none;" tabindex="0"><div
                    id="mCSB_4_container" class="mCSB_container mCS_y_hidden
                    mCS_no_scrollbar_y" style="position:relative; top:0; left:0;"
                    dir="ltr">
                    <div class="nav__dropdown-inner">
                        <ul>
                        <li>
                            <span class="nav__item">
                            <a href="https://alison.com/resume/courses"
                                title="Continue Learning" class="header__user-continue">
                                <span class="icon-start-topic"></span> Continue Learning
                            </a>
                            </span>
                        </li>
                        <li>
                            <span class="nav__dropdown-level-2
                            nav__dropdown-categories-2 block">
                            <div class="activate-subnav">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/explore-course-categories.svg">
                                </span>
                                <span class="label-position">Explore Course Categories</span>
                                <span class="icon-thick-chevron-up"></span>
                            </div>
                            <span class="nav__item nav__item--b nav__item--dropdown
                                nav__item--slide">
                                <div class="nav__dropdown nav__dropdown--categories
                                nav__dropdown--slide">
                                <ul>
                                    <li class="subnav-back">
                                    <span class="icon-arrow-thin-right"></span>
                                    Explore Course Categories </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/it" title="IT
                                        Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/it.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            IT <br>
                                            <span class="course-amount">924 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                IT
                                            </span>
                                            <a href="https://alison.com/courses/it"
                                                title="IT Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_15 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_15" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_15_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/network-and-security"
                                                    title="Network Security Courses">
                                                    <h6>Network Security</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/software-development"
                                                    title="Programming Courses">
                                                    <h6>Programming</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/software-tools"
                                                    title="Information Systems Courses">
                                                    <h6>Information Systems</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it-management"
                                                    title="Management Courses">
                                                    <h6>Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/software-engineering"
                                                    title="Engineering Courses">
                                                    <h6>Engineering</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/data-science"
                                                    title="Data Science Courses">
                                                    <h6>Data Science</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/databases"
                                                    title="Databases Courses">
                                                    <h6>Databases</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/administration"
                                                    title="Administration Courses">
                                                    <h6>Administration</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/aws"
                                                    title="AWS Courses">
                                                    <h6>AWS</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/business-management"
                                                    title="Business Management Courses">
                                                    <h6>Business Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/ccna"
                                                    title="CCNA Courses">
                                                    <h6>CCNA</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/comptia"
                                                    title="Comptia Courses">
                                                    <h6>Comptia</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/computer-networking"
                                                    title="Computer Networking Courses">
                                                    <h6>Computer Networking</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/cryptocurrency"
                                                    title="Cryptocurrency Courses">
                                                    <h6>Cryptocurrency</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/data-security"
                                                    title="Data Security Courses">
                                                    <h6>Data Security</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/devops"
                                                    title="DevOps Courses">
                                                    <h6>DevOps</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/microsoft"
                                                    title="Microsoft Courses">
                                                    <h6>Microsoft</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/security"
                                                    title="Security Courses">
                                                    <h6>Security</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/server"
                                                    title="Server Courses">
                                                    <h6>Server</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/it/small-business"
                                                    title="Small Business Courses">
                                                    <h6>Small Business</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_15_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_15_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_15_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/it"
                                            title="IT Courses">
                                            View Top IT Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/health"
                                        title="Health Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/health.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Health <br>
                                            <span class="course-amount">507 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Health
                                            </span>
                                            <a
                                                href="https://alison.com/courses/health"
                                                title="Health Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_16 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_16" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_16_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/mental-health"
                                                    title="Mental Health Courses">
                                                    <h6>Mental Health</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health-care"
                                                    title="Healthcare Courses">
                                                    <h6>Healthcare</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/nursing"
                                                    title="Nursing Courses">
                                                    <h6>Nursing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/caregiving"
                                                    title="Caregiving Courses">
                                                    <h6>Caregiving</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/nutrition"
                                                    title="Nutrition Courses">
                                                    <h6>Nutrition</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/food-and-beverage"
                                                    title="Food Safety Courses">
                                                    <h6>Food Safety</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/pharmacology"
                                                    title="Pharmacology Courses">
                                                    <h6>Pharmacology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/dementia"
                                                    title="Dementia Courses">
                                                    <h6>Dementia</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/disability"
                                                    title="Disability Courses">
                                                    <h6>Disability</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/health-and-fitness"
                                                    title="Health And Fitness Courses">
                                                    <h6>Health And Fitness</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/hygiene"
                                                    title="Hygiene Courses">
                                                    <h6>Hygiene</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/management"
                                                    title="Management Courses">
                                                    <h6>Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/physical-therapy"
                                                    title="Physical Therapy Courses">
                                                    <h6>Physical Therapy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/physiology"
                                                    title="Physiology Courses">
                                                    <h6>Physiology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/physiotherapy"
                                                    title="Physiotherapy Courses">
                                                    <h6>Physiotherapy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/substance-abuse"
                                                    title="Substance Abuse Courses">
                                                    <h6>Substance Abuse</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/therapy"
                                                    title="Therapy Courses">
                                                    <h6>Therapy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health/trauma"
                                                    title="Trauma Courses">
                                                    <h6>Trauma</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_16_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_16_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_16_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/health"
                                            title="Health Courses">
                                            View Top Health Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/language"
                                        title="Language Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/language.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Language <br>
                                            <span class="course-amount">243 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Language
                                            </span>
                                            <a
                                                href="https://alison.com/courses/language"
                                                title="Language Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_17 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_17" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_17_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/tag/english-language"
                                                    title="English Language Courses">
                                                    <h6>English Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/spanish"
                                                    title="Spanish Language Courses">
                                                    <h6>Spanish Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/german"
                                                    title="German Language Courses">
                                                    <h6>German Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/irish"
                                                    title="Irish Language Courses">
                                                    <h6>Irish Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/french"
                                                    title="French Language Courses">
                                                    <h6>French Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/chinese"
                                                    title="Chinese Language Courses">
                                                    <h6>Chinese Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/swedish"
                                                    title="Swedish Language Courses">
                                                    <h6>Swedish Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/japanese"
                                                    title="Japanese Language Courses">
                                                    <h6>Japanese Language</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/business-english"
                                                    title="Business English Courses">
                                                    <h6>Business English</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-conversation"
                                                    title="English Conversation
                                                    Courses">
                                                    <h6>English Conversation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-for-stem"
                                                    title="English For Stem Courses">
                                                    <h6>English For Stem</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-literature"
                                                    title="English Literature Courses">
                                                    <h6>English Literature</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-pronunciation"
                                                    title="English Pronunciation
                                                    Courses">
                                                    <h6>English Pronunciation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-vocabulary"
                                                    title="English Vocabulary Courses">
                                                    <h6>English Vocabulary</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/english-writing"
                                                    title="English Writing Courses">
                                                    <h6>English Writing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/front-desk"
                                                    title="Front Desk Courses">
                                                    <h6>Front Desk</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/tesl"
                                                    title="TESL Courses">
                                                    <h6>TESL</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/language/travel"
                                                    title="Travel Courses">
                                                    <h6>Travel</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_17_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_17_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_17_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/language"
                                            title="Language Courses">
                                            View Top Language Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/business"
                                        title="Business Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/business.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Business <br>
                                            <span class="course-amount">1305 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Business
                                            </span>
                                            <a
                                                href="https://alison.com/courses/business"
                                                title="Business Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_18 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_18" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_18_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/human-resources"
                                                    title="Human Resources Courses">
                                                    <h6>Human Resources</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/operations"
                                                    title="Operations Courses">
                                                    <h6>Operations</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/supply-chain-management"
                                                    title="Supply Chain Management
                                                    Courses">
                                                    <h6>Supply Chain Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/customer-service"
                                                    title="Customer Service Courses">
                                                    <h6>Customer Service</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/manufacturing"
                                                    title="Manufacturing Courses">
                                                    <h6>Manufacturing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/health-and-safety"
                                                    title="Health And Safety Courses">
                                                    <h6>Health And Safety</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/quality-control"
                                                    title="Quality Management Courses">
                                                    <h6>Quality Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/e-commerce"
                                                    title="E-commerce Courses">
                                                    <h6>E-commerce</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/leadership-and-management"
                                                    title="Management Courses">
                                                    <h6>Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/sales"
                                                    title="Sales Courses">
                                                    <h6>Sales</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/accounting"
                                                    title="Accounting Courses">
                                                    <h6>Accounting</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/tourism-and-hospitality"
                                                    title="Hospitality Courses">
                                                    <h6>Hospitality</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/communications"
                                                    title="Communication Skills
                                                    Courses">
                                                    <h6>Communication Skills</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/auditing"
                                                    title="Auditing Courses">
                                                    <h6>Auditing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/iso"
                                                    title="ISO Courses">
                                                    <h6>ISO</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/marketing"
                                                    title="Marketing Courses">
                                                    <h6>Marketing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/microsoft"
                                                    title="Microsoft Courses">
                                                    <h6>Microsoft</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/motivation"
                                                    title="Motivation Courses">
                                                    <h6>Motivation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/business/productivity"
                                                    title="Productivity Courses">
                                                    <h6>Productivity</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_18_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_18_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_18_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/business"
                                            title="Business Courses">
                                            View Top Business Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/management"
                                        title="Management Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/management.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Management <br>
                                            <span class="course-amount">754 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Management
                                            </span>
                                            <a
                                                href="https://alison.com/courses/management"
                                                title="Management Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_19 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_19" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_19_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/business-process-management"
                                                    title="Operations Courses">
                                                    <h6>Operations</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/finances-and-banking"
                                                    title="Accounting Courses">
                                                    <h6>Accounting</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/workplace-supervision"
                                                    title="Supervision Courses">
                                                    <h6>Supervision</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/auditing"
                                                    title="Auditing Courses">
                                                    <h6>Auditing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/health-and-safety"
                                                    title="Health and Safety Courses">
                                                    <h6>Health and Safety</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/human-resources"
                                                    title="Human Resources Courses">
                                                    <h6>Human Resources</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/iso"
                                                    title="ISO Courses">
                                                    <h6>ISO</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/lean"
                                                    title="Lean Courses">
                                                    <h6>Lean</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/manufacturing"
                                                    title="Manufacturing Courses">
                                                    <h6>Manufacturing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/motivation"
                                                    title="Motivation Courses">
                                                    <h6>Motivation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/nursing"
                                                    title="Nursing Courses">
                                                    <h6>Nursing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/productivity"
                                                    title="Productivity Courses">
                                                    <h6>Productivity</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/project-management"
                                                    title="Project Management Courses">
                                                    <h6>Project Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/quality-management"
                                                    title="Quality Management Courses">
                                                    <h6>Quality Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/retail"
                                                    title="Retail Courses">
                                                    <h6>Retail</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/management/supply-chain-management"
                                                    title="Supply Chain Management
                                                    Courses">
                                                    <h6>Supply Chain Management</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_19_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_19_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_19_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/management"
                                            title="Management Courses">
                                            View Top Management Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/personal-development"
                                        title="Personal Development Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/personal-development.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Personal Development <br>
                                            <span class="course-amount">818 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Personal Development
                                            </span>
                                            <a
                                                href="https://alison.com/courses/personal-development"
                                                title="Personal Development Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_20 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_20" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_20_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/fitness"
                                                    title="Fitness Courses">
                                                    <h6>Fitness</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/psychology"
                                                    title="Psychology Courses">
                                                    <h6>Psychology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/finance"
                                                    title="Finance Courses">
                                                    <h6>Finance</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/music"
                                                    title="Music Courses">
                                                    <h6>Music</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/photography"
                                                    title="Photography Courses">
                                                    <h6>Photography</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/anxiety"
                                                    title="Anxiety Courses">
                                                    <h6>Anxiety</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/communication-skills"
                                                    title="Communication Skills
                                                    Courses">
                                                    <h6>Communication Skills</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/depression"
                                                    title="Depression Courses">
                                                    <h6>Depression</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/diet"
                                                    title="Diet Courses">
                                                    <h6>Diet</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/dslr"
                                                    title="DSLR Courses">
                                                    <h6>DSLR</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/health"
                                                    title="Health Courses">
                                                    <h6>Health</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/mental-health"
                                                    title="Mental Health Courses">
                                                    <h6>Mental Health</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/mindset"
                                                    title="Mindset Courses">
                                                    <h6>Mindset</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/motivation"
                                                    title="Motivation Courses">
                                                    <h6>Motivation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/positive-psychology"
                                                    title="Positive Psychology Courses">
                                                    <h6>Positive Psychology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/stress-management"
                                                    title="Stress Management Courses">
                                                    <h6>Stress Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/therapy"
                                                    title="Therapy Courses">
                                                    <h6>Therapy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/personal-development/time-management"
                                                    title="Time Management Courses">
                                                    <h6>Time Management</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_20_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_20_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_20_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/personal-development"
                                            title="Personal Development Courses">
                                            View Top Personal Development Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/marketing"
                                        title="Sales &amp; Marketing Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/marketing.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Sales &amp; Marketing <br>
                                            <span class="course-amount">288 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Sales &amp; Marketing
                                            </span>
                                            <a
                                                href="https://alison.com/courses/marketing"
                                                title="Sales &amp; Marketing Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_21 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_21" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_21_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/entrepreneurship"
                                                    title="Entrepreneurship Courses">
                                                    <h6>Entrepreneurship</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing-management"
                                                    title="Management Courses">
                                                    <h6>Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/digital-marketing"
                                                    title="Digital Marketing Courses">
                                                    <h6>Digital Marketing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/advertising"
                                                    title="Advertising Courses">
                                                    <h6>Advertising</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/amazon"
                                                    title="Amazon Courses">
                                                    <h6>Amazon</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/content-marketing"
                                                    title="Content Marketing Courses">
                                                    <h6>Content Marketing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/data-security"
                                                    title="Data Security Courses">
                                                    <h6>Data Security</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/ethics"
                                                    title="Ethics Courses">
                                                    <h6>Ethics</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/market-research"
                                                    title="Market Research Courses">
                                                    <h6>Market Research</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/marketing-strategy"
                                                    title="Marketing Strategy Courses">
                                                    <h6>Marketing Strategy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/presentation-skills"
                                                    title="Presentation Skills Courses">
                                                    <h6>Presentation Skills</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/product-marketing"
                                                    title="Product Marketing Courses">
                                                    <h6>Product Marketing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/retail"
                                                    title="Retail Courses">
                                                    <h6>Retail</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/sales"
                                                    title="Sales Courses">
                                                    <h6>Sales</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/marketing/social-media"
                                                    title="Social Media Courses">
                                                    <h6>Social Media</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_21_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_21_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_21_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/marketing"
                                            title="Sales &amp; Marketing Courses">
                                            View Top Sales &amp; Marketing Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/engineering"
                                        title="Engineering &amp; Construction Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/engineering.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Engineering &amp; Construction <br>
                                            <span class="course-amount">655 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Engineering &amp; Construction
                                            </span>
                                            <a
                                                href="https://alison.com/courses/engineering"
                                                title="Engineering &amp; Construction
                                                Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_22 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_22" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_22_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/risk-management"
                                                    title="Risk Management Courses">
                                                    <h6>Risk Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/skilled-trades"
                                                    title="Construction Courses">
                                                    <h6>Construction</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/electrical"
                                                    title="Electrical Engineering
                                                    Courses">
                                                    <h6>Electrical Engineering</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/carpentry"
                                                    title="Carpentry Courses">
                                                    <h6>Carpentry</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/motor"
                                                    title="Automotive Engineering
                                                    Courses">
                                                    <h6>Automotive Engineering</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/critical-operations"
                                                    title="Operations Courses">
                                                    <h6>Operations</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/auditing"
                                                    title="Auditing Courses">
                                                    <h6>Auditing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/compliance"
                                                    title="Compliance Courses">
                                                    <h6>Compliance</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/engineering"
                                                    title="Engineering Courses">
                                                    <h6>Engineering</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/health-and-safety"
                                                    title="Health And Safety Courses">
                                                    <h6>Health And Safety</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/iso"
                                                    title="ISO Courses">
                                                    <h6>ISO</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/kaizen"
                                                    title="Kaizen Courses">
                                                    <h6>Kaizen</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/kanban"
                                                    title="Kanban Courses">
                                                    <h6>Kanban</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/lean"
                                                    title="Lean Courses">
                                                    <h6>Lean</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/management"
                                                    title="Management Courses">
                                                    <h6>Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/manufacturing"
                                                    title="Manufacturing Courses">
                                                    <h6>Manufacturing</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/quality-management"
                                                    title="Quality Management Courses">
                                                    <h6>Quality Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/renewable-energy"
                                                    title="Renewable Energy Courses">
                                                    <h6>Renewable Energy</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/six-sigma"
                                                    title="Six Sigma Courses">
                                                    <h6>Six Sigma</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/engineering/supply-chain-management"
                                                    title="Supply Chain Management
                                                    Courses">
                                                    <h6>Supply Chain Management</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_22_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_22_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_22_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/engineering"
                                            title="Engineering &amp; Construction
                                            Courses">
                                            View Top Engineering &amp; Construction
                                            Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                    <li>
                                    <div class="nav__item-link
                                        nav__item-link--has-child"
                                        href="https://alison.com/courses/education"
                                        title="Teaching &amp; Academics Courses">
                                        <div class="nav__item-inner">
                                        <span>
                                            <img class="lazyload mCS_img_loaded"
                                            data-src="https://cdn01.alison-static.net/public/html/site/img/workforce/education.svg"
                                            alt="">
                                        </span>
                                        <div>
                                            Teaching &amp; Academics <br>
                                            <span class="course-amount">1068 Courses</span>
                                        </div>
                                        <span class="icon-thick-chevron-up"></span>
                                        </div>
                                        <div class="nav__children">
                                        <div class="nav__children-inner"
                                            style="min-height: calc(100vh - 72px);">
                                            <span class="nav__children-top">
                                            <span class="child-nav-back">
                                                <span class="icon-filter_up"></span>
                                                Teaching &amp; Academics
                                            </span>
                                            <a
                                                href="https://alison.com/courses/education"
                                                title="Teaching &amp; Academics
                                                Courses">
                                                View All <span
                                                class="icon-thick-arrow-right"></span>
                                            </a>
                                            </span>
                                            <div class="nav__children-sub
                                            mCustomScrollbar _mCS_23 mCS_no_scrollbar"
                                            style="min-height: calc(100vh - 185px);"><div
                                                id="mCSB_23" class="mCustomScrollBox
                                                mCS-3d mCSB_vertical mCSB_inside"
                                                style="max-height: 0px;" tabindex="0"><div
                                                id="mCSB_23_container"
                                                class="mCSB_container mCS_y_hidden
                                                mCS_no_scrollbar_y"
                                                style="position:relative; top:0;
                                                left:0;" dir="ltr">
                                                <a
                                                    href="https://alison.com/courses/science"
                                                    title="Science Courses">
                                                    <h6>Science</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/history"
                                                    title="History Courses">
                                                    <h6>History</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/geography"
                                                    title="Geography Courses">
                                                    <h6>Geography</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/law"
                                                    title="Law Courses">
                                                    <h6>Law</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/media-and-journalism"
                                                    title="Journalism Courses">
                                                    <h6>Journalism</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/economics"
                                                    title="Economics Courses">
                                                    <h6>Economics</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/math"
                                                    title="Mathematics Courses">
                                                    <h6>Mathematics</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/literature"
                                                    title="Literature Courses">
                                                    <h6>Literature</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/adult-education"
                                                    title="Adult Education Courses">
                                                    <h6>Adult Education</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/architecture"
                                                    title="Architecture Courses">
                                                    <h6>Architecture</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/classroom-management"
                                                    title="Classroom Management
                                                    Courses">
                                                    <h6>Classroom Management</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/climate-change"
                                                    title="Climate Change Courses">
                                                    <h6>Climate Change</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/educational-psychology"
                                                    title="Educational Psychology
                                                    Courses">
                                                    <h6>Educational Psychology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/human-anatomy"
                                                    title="Human Anatomy Courses">
                                                    <h6>Human Anatomy</h6>
                                                </a>

                                                <a
                                                    href="https://alison.com/courses/education/motivation"
                                                    title="Motivation Courses">
                                                    <h6>Motivation</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/music-theory"
                                                    title="Music Theory Courses">
                                                    <h6>Music Theory</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/psychology"
                                                    title="Psychology Courses">
                                                    <h6>Psychology</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/teaching"
                                                    title="Teaching Courses">
                                                    <h6>Teaching</h6>
                                                </a>
                                                <a
                                                    href="https://alison.com/courses/education/writing-skills"
                                                    title="Writing Skills Courses">
                                                    <h6>Writing Skills</h6>
                                                </a>
                                                </div><div
                                                id="mCSB_23_scrollbar_vertical"
                                                class="mCSB_scrollTools
                                                mCSB_23_scrollbar mCS-3d
                                                mCSB_scrollTools_vertical"
                                                style="display: none;"><div
                                                    class="mCSB_draggerContainer"><div
                                                    id="mCSB_23_dragger_vertical"
                                                    class="mCSB_dragger"
                                                    style="position: absolute;
                                                    min-height: 70px; top: 0px;"><div
                                                        class="mCSB_dragger_bar"
                                                        style="line-height: 70px;"></div></div><div
                                                    class="mCSB_draggerRail"></div></div></div></div></div>
                                            <a class="nav__children-bottom"
                                            href="https://alison.com/courses/education"
                                            title="Teaching &amp; Academics Courses">
                                            View Top Teaching &amp; Academics Courses
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                    </li>
                                </ul>
                                </div>
                            </span>

                            </span>
                        </li>
                        <li>
                            <a href="https://alison.com/diploma-courses" title="Diploma
                            Courses">
                            <span><img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/diploma-mobile.svg"></span>
                            Diploma Courses </a>
                        </li>
                        <li>
                            <a href="https://alison.com/certificate-courses"
                            title="Certificate Courses">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/certificate-mobile.svg">
                            </span>
                            Certificate Courses </a>
                        </li>
                        <li>
                            <span class="nav__dropdown-level-2
                            nav__dropdown-categories-2 block">
                            <div class="activate-subnav">
                                <span>
                                <img class="lazyload mCS_img_loaded"
                                    data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers.svg">
                                </span>
                                <span class="label-position">Explore Careers Categories</span>
                                <span class="icon-thick-chevron-up"></span>
                            </div>
                            <span class="nav__item nav__item--a nav__item--dropdown
                                nav__item--slide">
                                <div class="nav__dropdown nav__dropdown--categories
                                nav__dropdown--careers nav__dropdown--slide">
                                <div class="nav__children nav__children--career">
                                    <div class="nav__children-inner" style="min-height:
                                    calc(100vh - 72px);">
                                    <span class="nav__children-top">
                                        <span class="child-nav-back subnav-back">
                                        <span class="icon-filter_up"></span>
                                        Explore Careers Categories </span>
                                    </span>
                                    <div class="nav__children-sub mCustomScrollbar
                                        _mCS_24 mCS_no_scrollbar" style="min-height:
                                        calc(100vh - 185px); height: calc(100vh -
                                        185px);"><div id="mCSB_24"
                                        class="mCustomScrollBox mCS-3d mCSB_vertical
                                        mCSB_inside" style="max-height: 73px;"
                                        tabindex="0"><div id="mCSB_24_container"
                                            class="mCSB_container mCS_y_hidden
                                            mCS_no_scrollbar_y"
                                            style="position:relative; top:0; left:0;"
                                            dir="ltr">
                                            <ul>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/health"
                                                title="Careers inHealth Science">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/health.svg"
                                                        alt="Careers in Health Science">
                                                    </span>
                                                    <div>
                                                    Health Science <br>
                                                    <span class="course-amount">131
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/finance"
                                                title="Careers inFinance">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/finance.svg"
                                                        alt="Careers in Finance">
                                                    </span>
                                                    <div>
                                                    Finance <br>
                                                    <span class="course-amount">42
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/it"
                                                title="Careers inInformation
                                                Technology">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/it.svg"
                                                        alt="Careers in Information
                                                        Technology">
                                                    </span>
                                                    <div>
                                                    Information Technology <br>
                                                    <span class="course-amount">37
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/education"
                                                title="Careers inEducation and
                                                Training">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/education.svg"
                                                        alt="Careers in Education and
                                                        Training">
                                                    </span>
                                                    <div>
                                                    Education and Training <br>
                                                    <span class="course-amount">54
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/management"
                                                title="Careers inBusiness Management
                                                and Administration">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/management.svg"
                                                        alt="Careers in Business
                                                        Management and Administration">
                                                    </span>
                                                    <div>
                                                    Business Management and
                                                    Administration <br>
                                                    <span class="course-amount">50
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/marketing"
                                                title="Careers inMarketing, Sales, and
                                                Service">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/marketing.svg"
                                                        alt="Careers in Marketing,
                                                        Sales, and Service">
                                                    </span>
                                                    <div>
                                                    Marketing, Sales, and Service <br>
                                                    <span class="course-amount">39
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/agriculture-food-and-natural-resources"
                                                title="Careers inAgriculture, Food,
                                                and Natural Resources">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/agriculture-food-and-natural-resources.svg"
                                                        alt="Careers in Agriculture,
                                                        Food, and Natural Resources">
                                                    </span>
                                                    <div>
                                                    Agriculture, Food, and Natural
                                                    Resources <br>
                                                    <span class="course-amount">45
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/hospitality"
                                                title="Careers inHospitality and
                                                Tourism">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/hospitality.svg"
                                                        alt="Careers in Hospitality and
                                                        Tourism">
                                                    </span>
                                                    <div>
                                                    Hospitality and Tourism <br>
                                                    <span class="course-amount">15
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/stem"
                                                title="Careers inScience, Technology,
                                                Engineering, and Mathematics">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/stem.svg"
                                                        alt="Careers in Science,
                                                        Technology, Engineering, and
                                                        Mathematics">
                                                    </span>
                                                    <div>
                                                    Science, Technology, Engineering,
                                                    and Mathematics <br>
                                                    <span class="course-amount">105
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/architecture"
                                                title="Careers inArchitecture and
                                                Construction">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/architecture.svg"
                                                        alt="Careers in Architecture and
                                                        Construction">
                                                    </span>
                                                    <div>
                                                    Architecture and Construction <br>
                                                    <span class="course-amount">33
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/government"
                                                title="Careers inGovernment and Public
                                                Administration">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/government.svg"
                                                        alt="Careers in Government and
                                                        Public Administration">
                                                    </span>
                                                    <div>
                                                    Government and Public
                                                    Administration <br>
                                                    <span class="course-amount">14
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/security"
                                                title="Careers inLaw, Public Safety,
                                                Corrections, and Security">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/security.svg"
                                                        alt="Careers in Law, Public
                                                        Safety, Corrections, and
                                                        Security">
                                                    </span>
                                                    <div>
                                                    Law, Public Safety, Corrections,
                                                    and Security <br>
                                                    <span class="course-amount">66
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/manufacturing"
                                                title="Careers inManufacturing">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/manufacturing.svg"
                                                        alt="Careers in Manufacturing">
                                                    </span>
                                                    <div>
                                                    Manufacturing <br>
                                                    <span class="course-amount">12
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/distribution"
                                                title="Careers inTransportation,
                                                Distribution, and Logistics">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/distribution.svg"
                                                        alt="Careers in Transportation,
                                                        Distribution, and Logistics">
                                                    </span>
                                                    <div>
                                                    Transportation, Distribution, and
                                                    Logistics <br>
                                                    <span class="course-amount">31
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/human-services"
                                                title="Careers inHuman Services">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/human-services.svg"
                                                        alt="Careers in Human Services">
                                                    </span>
                                                    <div>
                                                    Human Services <br>
                                                    <span class="course-amount">62
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="nav__item-link"
                                                href="https://alison.com/careers/arts"
                                                title="Careers inArts, Audio/Video
                                                Technology, and Communications">
                                                <div class="nav__item-inner">
                                                    <span>
                                                    <img class="lazyload
                                                        mCS_img_loaded"
                                                        data-src="https://cdn01.alison-static.net/public/html/site/img/header/careers/arts.svg"
                                                        alt="Careers in Arts,
                                                        Audio/Video Technology, and
                                                        Communications">
                                                    </span>
                                                    <div>
                                                    Arts, Audio/Video Technology, and
                                                    Communications <br>
                                                    <span class="course-amount">92
                                                        Careers</span>
                                                    </div>
                                                    <span class="icon-thick-chevron-up"></span>
                                                </div>
                                                </a>
                                            </li>
                                            </ul>
                                        </div><div id="mCSB_24_scrollbar_vertical"
                                            class="mCSB_scrollTools mCSB_24_scrollbar
                                            mCS-3d mCSB_scrollTools_vertical"
                                            style="display: none;"><div
                                            class="mCSB_draggerContainer"><div
                                                id="mCSB_24_dragger_vertical"
                                                class="mCSB_dragger" style="position:
                                                absolute; min-height: 70px; top: 0px;"><div
                                                class="mCSB_dragger_bar"
                                                style="line-height: 70px;"></div></div><div
                                                class="mCSB_draggerRail"></div></div></div></div></div>
                                    <a class="nav__children-bottom"
                                        href="https://alison.com/careers" title="View
                                        All Categories">
                                        View All Categories </a>
                                    </div>
                                </div>
                                </div>
                            </span>

                            </span>
                        </li>
                        <li class="border-bottom">
                            <a href="https://alison.com/vertical/english" title="Learn
                            English">
                            <span>
                                <img style="width: 22px"
                                src="https://cdn01.alison-static.net/public/html/site/img/homepage/english-vertical-mobile-menu.svg"
                                title="Learn English" class="mCS_img_loaded">
                            </span>
                            Learn English </a>
                        </li>
                        <li>
                            <a href="https://alison.com/about/gopremium" title="Get
                            Alison Premium (Remove Ads)">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/premium-mobile.svg">
                            </span>
                            Get Alison Premium (Remove Ads) </a>
                        </li>
                        <li>
                            <a href="https://alison.com/psychometric-test/personality"
                            title="Workplace Personality Assessment">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/wpa-mobile.svg">
                            </span>
                            Workplace Personality Assessment </a>
                        </li>
                        <li>
                            <a href="https://alison.com/psychometric-test/wellbeing"
                            title="Mental Health Assessment">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/mental-health-mobile.svg">
                            </span>
                            Mental Health Assessment </a>
                        </li>
                        <li>
                            <a class="new-resume-link"
                            href="https://alison.com/cv?source=top-nav-bar"
                            title="Create Your Professional Resumé">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/your-resume.svg">
                            </span>
                            Resumé Builder
                            <span></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://blog.alison.com" target="_blank"
                            title="Alison Blog">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/blog-mobile.svg">
                            </span>
                            Alison Blog </a>
                        </li>
                        <li>
                            <a href="https://alison.com/business/contact-us"
                            title="Alison For Business">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/alison-business.svg">
                            </span>
                            Alison For Business </a>
                        </li>
                        <li>
                            <a href="https://alison.com/mobile/online-learning-app"
                            title="Download the Alison App">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/mobile-app-mobile.svg">
                            </span>
                            Download the Alison App </a>
                        </li>
                        </ul>
                    </div>

                    </div><div id="mCSB_4_scrollbar_vertical" class="mCSB_scrollTools
                    mCSB_4_scrollbar mCS-3d mCSB_scrollTools_vertical" style="display:
                    none;"><div class="mCSB_draggerContainer"><div
                        id="mCSB_4_dragger_vertical" class="mCSB_dragger"
                        style="position: absolute; min-height: 70px; top: 0px;"><div
                            class="mCSB_dragger_bar" style="line-height: 70px;"></div></div><div
                        class="mCSB_draggerRail"></div></div></div></div></div>
            </span>
            </div>
        </div>



        <div class="header__user header__user--logged-in nav">
            <span class="q-aff"> 
                <span class="coin coin--active"> <!-- onop -->
                    <span class="front"></span>
                    <span class="back"></span>
                </span>
                <div class="aff">
                    <div class="aff__message aff__message--not-affiliate" style="display:none;">
                    <span class="icon-cross2 aff__close"></span>
                    <img src="/html/site/img/affiliates/not-affiliate.svg">
                    <div class="aff__text">
                        <p>
                        Become an Alison Affiliate in one click, and start earning money
                        by sharing any page on the Alison website.
                        </p>
                        <a class="aff__btn"
                        href="https://alison.com/affiliates/learn-to-earn">Become an
                        Affiliate</a>
                    </div>
                    </div>
                </div>
            </span>
            <span class="nav__item nav__item--continue_learning">
                <a href="https://alison.com/resume/courses" title="Continue Learning"
                    class="header__user-continue">
                    <span class="icon-start-topic"></span> Continue Learning 
                </a>
            </span>
            <?php //echo do_shortcode( '[foy_lr]' );?>
               

            

            <?php
                if (is_user_logged_in() ){ ?>
                <span class="nav__item nav__item--dropdown nav__item--user-menu user-img">
                <span class="header__user-avatar activate-dropdown">  
                    <img class=" ls-is-cached lazyloaded" data-src="https://alison.com/images/users/default/27573143.jpg" alt="Q" src="https://alison.com/images/users/default/27573143.jpg">
                </span>
            <?php } 
                if ( !is_user_logged_in() ){ ?>
                <style>
                    .foy-mooc{
                        
                    }
                    .foy_log_reg{
                        display: flex;
                    }
                    .foy_log{
                        color: #83c11f;
                        margin-right: 24px;
                        font-weight: 700;
                    }
                    .foy_reg{
                        background: #83c11f;
                        border-radius: 25px;
                        color: #fff;
                        display: inline-block;
                        font-weight: 500;
                        margin-right: 13px;
                        padding: 7px 27px 8px;
                    }
                    .header__user {
                        align-items: center;
                        display: flex;
                        justify-content: flex-end;
                        padding-right: 14px;
                        width: 430px
                    }
                    .foy_log_reg li{
                        display: flex;
                        align-items: center;
                    }
                    .shine {
                        border: 0;
                        height: 34px;
                        overflow: hidden;
                        position: relative;
                        transition: .6s;
                        width: 111px;
                    }
                </style>
                <div class=" <?php if(isset($fix) && $fix){echo 'fix';} ?> foy-mooc">
                    <ul class="topmenu">
                        <?php do_action('wplms_header_top_login'); ?>
                        <?php
                            if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) :
                        ?>
                        <li>
                            <a href="<?php bp_loggedin_user_link(); ?>" class="smallimg vbplogin shine"><?php $n=vbp_current_user_notification_count(); echo ((isset($n) && $n)?'<em></em>':''); bp_loggedin_user_avatar( 'type=full' ); ?>
                                <span><?php bp_loggedin_user_fullname(); ?></span>
                            </a>
                        </li>
                        <?php
                            else:
                        ?>
                        <div class="foy_log_reg">
                            <li>
                                <a href="#login" rel="nofollow" class="vbplogin foy_log"><span><?php _e('Log In','vibe'); ?></span></a>
                            </li>
                            <li>
                                <a href="#login" rel="nofollow" class="vbplogin foy_reg"><span><?php _e('Sign Up','vibe'); ?></span></a>
                            </li>
                        </div>
                             
                        <?php
                            endif;    
                        ?>
                    </ul>
                    <?php
                        $style = vibe_get_login_style();
                        if(empty($style)){
                            $style='default_login';
                        }
                    ?>
                    <?php
                        if ( function_exists('bp_loggedin_user_link') && is_user_logged_in() ) {
                        ?>
                        <div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style,'text'); ?>">
                            <?php
                                vibe_include_template("login/$style.php");
                            ?>
                        </div>
                    <?php } ?>
                    <!-- login popup -->
                    <?php
                        if ( !is_user_logged_in() ){ ?>
                            <div class="foy-login-container">
                                <div id="vibe_bp_login" class="<?php echo vibe_sanitizer($style,'text'); ?> foy_vibe_bp_login">
                                    <?php
                                        vibe_include_template("login/$style.php");
                                    ?>
                                </div>
                            </div>
                    <?php } ?>
                    <!-- login popup ends -->
                </div>
            <?php } ?>




            <div class="nav__dropdown nav__dropdown--user-menu nav__dropdown--scroll mCustomScrollbar _mCS_5 mCS_no_scrollbar nav__dropdown--visible" style="display: none;">
                <div id="mCSB_5" class="mCustomScrollBox mCS-3d mCSB_vertical mCSB_inside"
                style="max-height: 501px;" tabindex="0"><div id="mCSB_5_container"
                    class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                    style="position:relative; top:0; left:0;" dir="ltr">
                    <div class="nav__dropdown-inner">
                    <ul>
                        <li class="header__user-info">
                        <span class="header__user-avatar">
                            <img class="lazyload mCS_img_loaded"
                            data-src="https://alison.com/images/users/default/27573143.jpg"
                            alt="Q Q">
                        </span>
                        <span>
                            <div class="header__user-name">Q Q</div>
                            <a class="new-profile-link link--new"
                            href="https://alison.com/profile" title="View Your Alison
                            Profile">
                            View Your Alison Profile
                            <span></span>
                            </a>
                        </span>
                        </li>
                        <li class="for-mobile">
                        <span class="nav__item">
                            <a href="https://alison.com/resume/courses" title="Resume
                            Study" class="header__user-continue">
                            <span class="icon-start-topic"></span> Continue Learning
                            </a>
                        </span>
                        </li>
                        <li>
                        <a href="https://alison.com/dashboard" title="Your Dashboard">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/dashboard.svg">
                            </span>
                            Your Dashboard </a>
                        </li>
                        <li class="get-your-cert">
                        <a href="https://alison.com/shop">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/your-certificates.svg">
                            </span>
                            <span>
                            Get Your Certificates </span>
                        </a>
                        </li>
                        <li>
                        <a class="new-resume-link resume__link"
                            href="https://alison.com/cv?source=dropdown-nav-bar">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/your-resume.svg">
                            </span>
                            Create Your Resumé
                            <span></span>
                        </a>
                        </li>
                        <li>
                        <a href="https://alison.com/settings">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/settings.svg">
                            </span>
                            Account Settings </a>
                        </li>
                        <li>
                        <span class="nav__dropdown-level-2 block">
                            <div class="activate-subnav">
                            <span>
                                <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/language.svg">
                            </span>
                            <span class="label-position">
                                Change Language </span>
                            <span class="icon-thick-chevron-up"></span>
                            </div>
                            <span class="nav__item nav__item--dropdown nav__item--slide
                            nav__item--languages ">
                            <span class="icon-globe">
                                <span class="language">
                                en
                                </span>
                            </span>
                            <div class="nav__dropdown nav__dropdown--slide
                                nav__dropdown--languages">
                                <ul>
                                <li class="border-bottom extra-padding subnav-back">
                                    <span class="icon-arrow-thin-right"></span> Change
                                    Language
                                </li>
                                <li class="selected">
                                    <a rel="alternate" hreflang="en"
                                    href="https://alison.com/en">
                                    <span>
                                        <img
                                        src="https://cdn01.alison-static.net/public/html/site/img/header/en.svg"
                                        alt="English Language Select"
                                        class="mCS_img_loaded">
                                    </span>
                                    English
                                    </a>
                                </li>
                                <li>
                                    <a rel="alternate" hreflang="es"
                                    href="https://alison.com/es">
                                    <span>
                                        <img
                                        src="https://cdn01.alison-static.net/public/html/site/img/header/es.svg"
                                        alt="Spanish Language Select"
                                        class="mCS_img_loaded">
                                    </span>
                                    Spanish
                                    </a>
                                </li>
                                <li>
                                    <a rel="alternate" hreflang="fr"
                                    href="https://alison.com/fr">
                                    <span>
                                        <img
                                        src="https://cdn01.alison-static.net/public/html/site/img/header/fr.svg"
                                        alt="French Language Select"
                                        class="mCS_img_loaded">
                                    </span>
                                    French
                                    </a>
                                </li>
                                <li>
                                    <a rel="alternate" hreflang="it"
                                    href="https://alison.com/it">
                                    <span>
                                        <img
                                        src="https://cdn01.alison-static.net/public/html/site/img/header/it.svg"
                                        alt="Italian Language Select"
                                        class="mCS_img_loaded">
                                    </span>
                                    Italian
                                    </a>
                                </li>
                                <li>
                                    <a rel="alternate" hreflang="pt-BR"
                                    href="https://alison.com/pt-BR">
                                    <span>
                                        <img
                                        src="https://cdn01.alison-static.net/public/html/site/img/header/pt-BR.svg"
                                        alt="Brazilian Portuguese Language Select"
                                        class="mCS_img_loaded">
                                    </span>
                                    Brazilian Portuguese
                                    </a>
                                </li>
                                </ul>
                            </div>
                            </span>

                        </span>
                        </li>
                        <li>
                        <a href="https://alison.com/faqs">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/help.svg">
                            </span>
                            Help </a>
                        </li>
                        <li>
                        <a href="https://alison.com/logout">
                            <span>
                            <img class="lazyload mCS_img_loaded"
                                data-src="https://cdn01.alison-static.net/public/html/site/img/header/logout.svg">
                            </span>
                            Logout </a>
                        </li>
                    </ul>
                    </div>

                </div>
                <div id="mCSB_5_scrollbar_vertical" class="mCSB_scrollTools
                    mCSB_5_scrollbar mCS-3d mCSB_scrollTools_vertical" style="display:
                    none;">
                    <div class="mCSB_draggerContainer">
                        <div id="mCSB_5_dragger_vertical" class="mCSB_dragger"
                        style="position: absolute; min-height: 70px; top: 0px;"><div
                        class="mCSB_dragger_bar" style="line-height: 70px;"></div></div><div
                        class="mCSB_draggerRail"></div></div></div></div></div>
            </span>
            </div>
        </div>
        <div class="darken" style="display: none;"></div>
    </header>
<script>
    /**
         * Close desktop Menus
         *
         */
        function closeMenus(){
            jQuery('.activated').removeClass('activated');

            if(jQuery(window).width() > 800){
                jQuery('.nav__dropdown--visible').fadeOut();
            }

            jQuery('.open').removeClass('open fast');

            jQuery('.coin--active').removeClass('coin--active').parent().find('.a-link').fadeOut();

            jQuery('.nav__dropdown--visible').removeClass('nav__dropdown--visible');
        }

        /**
         * Close Mobile menus
         *
         */
        function closeMobileMenu(){
            jQuery('.nav__dropdown--user-menu.active').removeClass('active');
            jQuery('.icon-nb-menu').removeClass('close');
            jQuery('.subnav-active').removeClass('subnav-active')
            jQuery('body').removeClass('no-scroll');

            jQuery('.open').removeClass('open fast');

            jQuery('.lms-b__button').removeClass('lms-b__button--active');

            if(jQuery('#mCSB_1').length > 0){
                setTimeout(function(){
                    jQuery(".mCSB_container").css("top", 0);
                }, 500);
            }

            jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
        }

        jQuery(document).ready(function(){
            // Modify button id if given user is LMS owner
            if(jQuery('.lms-b__menu-inner').length){
                var userId = "27573143";

                jQuery('.lms-b__menu-inner ul li a').each((index, flms) => {
                    if(userId == $(flms).attr('data-owner')){
                        jQuery('.lms-b__button').attr('id', 'lms-b--owner');
                        return false;
                    }
                });
            }

            // Close menus
            jQuery(document).on('click', '.darken, .activated', function(e){
                closeMenus()
                closeMobileMenu();

                jQuery('.darken').fadeOut();

                jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
            });

            const vh = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0)

            // If screen height can't fit men
            if((vh - jQuery('.header__outer').height()) < 670){
                jQuery('.for-desktop .nav__item--b').find('.nav__children, .nav__dropdown--cats').css('max-height', 'calc(100vh - '+(jQuery('.header__outer').height() + 30)+'px)');

                jQuery(".for-desktop .nav__item--b .nav__categories.nav__categories--arrows:not(.nav__categories--careers) .nav__categories-inner").mCustomScrollbar({
                    theme: '3d',
                    scrollbarPosition: 'inside',
                    autoHideScrollbar: false,
                    documentTouchScroll: true
                });
            }

            if(jQuery(window).height() < 750){
                jQuery('.nav__dropdown--career').css('max-height', 'calc(100vh - '+(jQuery('.header__outer').height() + 30)+'px)');
            }

            // Fixing height of category menu
            var minus = jQuery('.header__outer').height(),
                menu_height = 113 + minus

            jQuery('.for-mobile .nav__children-inner').css('min-height', 'calc(100vh - '+minus+'px)');
            jQuery('.for-mobile .nav__children-sub').css('min-height', 'calc(100vh - '+menu_height+'px)');
            jQuery('.for-mobile .nav__children--career .nav__children-sub').css('height', 'calc(100vh - '+menu_height+'px)');

            // Cateogry menu submenu
            jQuery('.nav__categories--arrows .nav__parent-categories > a').hover(function(e){
                if(jQuery('.open').length > 0){
                    if(!jQuery(this).hasClass('open')){
                        jQuery('.open').removeClass('open').removeClass('fast');
                    }

                    jQuery(this).addClass('open');
                    jQuery('.nav__children').addClass('open fast').find("."+jQuery(this).attr('data-child')).addClass('open fast');
                }
                else{
                    jQuery(this).addClass('open');
                    jQuery('.nav__children').addClass('open').find("."+jQuery(this).attr('data-child')).addClass('open');
                }

                jQuery('.nav__dropdown--cats').addClass('open');
            });

            jQuery('.nav__item-link--has-child').click(function(e){
                var parents = jQuery(e.target).parents('.nav__item-inner');

                if(parents.length || jQuery(e.target).hasClass('nav__item-inner') || jQuery(e.target).hasClass('child-nav-back') || jQuery(e.target).hasClass('icon-filter_up')){
                    if(!jQuery(this).hasClass('open')){
                        // Remove other other menu
                        jQuery(this).addClass('open').find('.nav__children').addClass('open');
                    }
                    else {
                        jQuery(this).removeClass('open').find('.nav__children').removeClass('open');
                    }
                }
            });

            jQuery('.nav__dropdown-categories-2').on('click', function(){
                jQuery('.nav__dropdown').mCustomScrollbar('scrollTo', 0, {
                    // scroll as soon as clicked
                    timeout:0,
                    // scroll duration
                    scrollInertia:0,
                });
            });

            // When on mobile
            jQuery('.for-mobile .icon-nb-menu').on('click', function(e){
                var menu =  jQuery('.header__nav > .for-mobile .nav__dropdown--user-menu');

                closeMenus();

                if(menu.hasClass('active')){
                    jQuery('.darken').fadeOut();

                    closeMobileMenu();
                }
                else{
                    menu.addClass('active');
                    jQuery('.darken').fadeIn();

                    // Fade out the hamburger menu and show X
                    jQuery( ".icon-nb-menu" ).animate({
                        opacity: 0,
                    }, 300, function() {
                        jQuery('.icon-nb-menu').addClass('close');

                        jQuery(".icon-nb-menu").animate({
                            opacity: 1,
                        }, 300);
                    });

                    jQuery('body').addClass('no-scroll');
                }

                jQuery('.header__search-input').slideUp();
                jQuery('.hide-buy-cert').removeClass('hide-buy-cert');
            });

            // Mobile search
            jQuery('.for-mobile .icon-search').on('click', function(e){
                jQuery('.header__search-input').slideToggle();
                jQuery('.header__nav > .for-mobile .nav__dropdown--user-menu').removeClass('active');
            });

            // Activate sliding subnav
            jQuery(document).on('click', '.activate-subnav', function(e){
                console.log(jQuery(e.target).parents('.nav__item--slide').length === 0)
                if(jQuery(e.target).parents('.nav__item--slide').length === 0){
                    jQuery(this).parents('.nav__dropdown--user-menu').toggleClass('subnav-active');
                    jQuery(this).parents('.nav__dropdown-level-2').toggleClass('subnav-active');
                }
            });

            // Go back from subnav
            jQuery(document).on('click', '.subnav-back', function(){
               jQuery('.subnav-active').removeClass('subnav-active');
            });

            // Desktop menus
            jQuery(document).on('click', '.lms-b__button', function(e){
                if(!jQuery(this).hasClass('lms-b__button--active')){
                    closeMobileMenu();
                    closeMenus();

                    jQuery(this).addClass('lms-b__button--active').next().fadeIn().addClass('nav__dropdown--visible');
                    jQuery('.darken').fadeIn();
                }
                else{
                    jQuery(this).removeClass('lms-b__button--active').next().fadeOut().removeClass('nav__dropdown--visible');
                    jQuery('.darken').fadeOut();
                }
            });

            // Desktop menus
            jQuery(document).on('click', '.activate-dropdown:not(.activated)', function(e){
                e.preventDefault();

                closeMobileMenu();

                jQuery('.nav__dropdown--visible').hide();
                jQuery('.activated').removeClass('activated');

                // Remove dark BG
                jQuery('.darken').fadeIn();

                jQuery(this).addClass('activated');

                var parent = jQuery(this).parent().find('.nav__dropdown').first();

                parent.addClass('nav__dropdown--visible');

                if(jQuery(window).width() > 800){
                    parent.fadeIn();
                }

                if(jQuery(this).parent().hasClass('buy-cert')){
                    jQuery(this).parent().addClass('hide-buy-cert');
                }
            });

            jQuery(".nav__dropdown--scroll, .nav__parent-categories").mCustomScrollbar({
                theme: '3d',
                scrollbarPosition: 'inside',
                autoHideScrollbar: false,
                documentTouchScroll: true
            });

            jQuery(".nav__children-sub").mCustomScrollbar({
                theme: '3d',
                scrollbarPosition: 'inside',
                autoHideScrollbar: false,
                documentTouchScroll: true
            });

            if(jQuery(window).width() < 976){
                jQuery(".nav__dropdown--categories").mCustomScrollbar({
                    theme: '3d',
                    scrollbarPosition: 'inside',
                    autoHideScrollbar: false,
                    documentTouchScroll: true
                });
            }
        });

        // Profile image pulse
                    var header_target = $('.activate-dropdown.header__user-avatar, .player-header__right .user__avatar'),
                signed_up = new Date("2022-11-16 08:26:16"),
                now_date = new Date("2023-01-09 05:26:44"),
                time_diff = (now_date.getTime() - signed_up.getTime()) / (1000 * 3600);

            // If profile menu is not clicked
            if(localStorage.getItem('profile_seen') === null || localStorage.getItem('resume_seen') === null){

                // If the user has joined alison more than 36 hours ago
                if(Math.floor(time_diff) > 36) {
                    // If pulse has already been played and is on hold for 20 mins
                    if(localStorage.getItem('menu_clicked') === null){
                        if(localStorage.getItem('replay_pulse') !== null){
                            var pulse_date = new Date(localStorage.getItem('replay_pulse')),
                                pulse_time_diff = (now_date.getTime() - signed_up.getTime()) / (1000 * 60);

                            if(pulse_time_diff > 20){
                                header_target.addClass('pulse');
                                // Update pulse loop time
                                localStorage.setItem('replay_pulse',  new Date());
                            }
                        }
                        // Else just automatically add the pulse
                        else{
                            header_target.addClass('pulse');

                            // Update pulse loop time
                            localStorage.setItem('replay_pulse',  new Date());
                        }
                    }

                    // If profile hasn't been seen then add new link button
                    if(localStorage.getItem('profile_seen') === null){
                        $('.new-profile-link').addClass('link--new');
                    }

                    // If resume hasn't been seen then add new link button
                    if(localStorage.getItem('resume_seen') === null){
                        $('.new-resume-link').addClass('link--new');
                    }
                }
                // Else user is new so just add the resume new
                else{
                    // If resume hasn't been seen then add new link button
                    if(localStorage.getItem('resume_seen') === null){
                        $('.nav__dropdown-button.new-resume-link').addClass('link--new');
                    }
                }
            }

            if(header_target.hasClass('pulse')){
                setTimeout(function(){
                    header_target.removeClass('pulse');

                    // Update pulse loop time
                    localStorage.setItem('replay_pulse',  new Date());
                }, 12000);
            }

            header_target.click(function(){
                $(this).removeClass('pulse');
                // Update pulse loop time
                localStorage.setItem('menu_clicked',  '1');
            });
</script>