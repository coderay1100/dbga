Database Group Assignment
===
<p>
  <h3>Dependencies:</h3>
  <ul>
    <li>Apache</li>
    <li>PostgreSQL Version 9.3</li>
    <li>PHP 5</li>
  </ul>
</p>

<p><h3>Git user</h3><code>$ git clone https://github.com/coderay1100/dbga.git</code></p>

<p>
  <h3>How to configure:</h3>
  <ol>
    <li>Place our project folder inside your web server directory (e.g., htdocs)</li>
    <li>Open terminal then cd to the project folder <code>$ cd <i>webserverdir</i>/<i>projectfolder</i></code></li>
    <li>Import database <code>$ psql -U <i>yourusername</i> &lt; out.sql</code></li>
    <li>Go to functions/dbconnect.php, then modify the <code>connectDB()</code> function to suit your personal database settings (e.g., username, password)</li>
  </ol>
</p>
