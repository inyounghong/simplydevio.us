# Main heading all


<ul class="outline" fa-ul>
    <li><a href="#introduction">Introduction</a></li>
    <li><a href="#installation">Installation</a></li>
    <li ng-show={{$ctrl.project.technologies}}><a href="#technologies">Technologies</a></li>
</ul>

<h2 id="introduction">Introduction</h2>
<p>My main purpose for building this project was to explore ReactJS and Redux.</p>

<h3>Features</h3>
<ul>
    <li>Users can add Stories, which contain Tasks.</li>
    <li>Each Story has three columns: Todo, Testing, and Done.</li>
    <li>Tasks can be moved between these three columns, and also between Stories.</li>
    <li>The app can be toggled between a Column View and a Story View.</li>
    <li>The app is saved in local storage, and can be reset by the user.</li>
</ul>

<img src="{{$ctrl.imagePath}}/react-kanban.gif">

<h2 id="installation">Installation</h2>
<p>npm install</p>
<p>npm start</p>

<div ng-include="'./pages/partials/technologies.html'" ng-show="{{$ctrl.project.technologies}}"></div>
