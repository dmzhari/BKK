# THIS PROJECT UNDER CONSTRUCTION

## Features

- PARTNER
  - CRUD LOKER
  - CHECKING DATA PELAMAR (ORDER BY LOKER)
  - SETTING PROFILE
- CLIENT / PENCAKER / PELAMAR
  - INFO LOKER
  - ACC LOKER
  - SETTING PROFILE

## How To

- Install
  - First you must install composer and git to your system
  - if all of that has been installed
  - open your terminal and following this command

```
git clone https://github.com/dmzhari/BKK
cd BKK
composer install
```

- Usage

  - Create Database name **db_blablabla(Database name is up to you)** in your phpmyadmin
  - Restore database from folder **db** into the **db_blablabla**
  - Open Folder **inc** and then open the file **function.database.php**
  - Then Changed All Database into your MySQL Database
  - Finish

- Login User
  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Level</th>
      </tr>
    </thead>
    </tbody>
      <tr>
        <td>partner@gmail.com</td>
        <td>partner990</td>
        <td>Partner</td>
      </tr>
      <tr>
        <td>hari990@gmail.com</td>
        <td>ecchi990</td>
        <td>Client</td>
      </tr>
    </tbody>
  </table>

### Note

if this project you installed in sub folder or sub directory you must change this file <b>detail_loker.php</b> from folder <b>user</b> and go to line 63 changed **base_url("false", "replace this and change it to where this project is saved in sub folder or directory")**

## License

[GNU GPL v3](LICENSE)
