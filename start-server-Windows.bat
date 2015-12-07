setlocal
SET port=8080

src\external-libraries\winbash\sh.exe -login -i -c "port=%port%;cd 'src/external-libraries/php';php -S localhost:${port} -t '..\..' -c '..\..\php.ini'"
endlocal