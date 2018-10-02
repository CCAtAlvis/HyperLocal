body {
    margin: 0;
    background: #eee;
    background: linear-gradient(90deg, rgba(150,0,0,0.5), rgba(0,0,150,0.5));
}

header {
    min-height: 30px;
    height: auto;
    overflow-y: hidden;
}

a { text-decoration: none; }

#navbar {
    position: relative;
    float: right;
    right: 40px;
    /* background: #fff; */
}

.nav-item {
    position: relative;
    padding: 20px;
    float: left;
}

.nav-item a {
	position: relative;
	display: inline-block;
	outline: none;
	text-decoration: none;
	letter-spacing: 1px;
	/* color: #0972b4; */
    /* color: #6f6; */
    color: #000;
    font-size: 30px;
    font-family: 'raleway';
    font-weight: bolder;
}

.nav-item a::before {
	position: absolute;
	top: 0;
	left: 0;
	overflow: hidden;
    max-width: 0;
	color: aqua;
	content: attr(data-hover);
	-webkit-transition: max-width 0.5s;
	-moz-transition: max-width 0.5s;
	transition: max-width 0.5s;
	white-space: nowrap;
}

.nav-item a:hover::before,
.nav-item a:focus::before {
    max-width: 50%;
}

#body {
    position: relative;
    width: 80%;
    margin: auto;

    margin-top: 60px;
    height: auto;
    overflow-y: hidden;

    display: flex;
}
