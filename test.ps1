#[Console]::OutputEncoding = [System.Text.Encoding]::GetEncoding("utf-8")
#для установления корректной кодировки при выводе сообщений на русском
$msBuildStatus=msbuild  UI.csproj 
if($LASTEXITCODE -eq 0){
	echo 'Билд прошел успешно';
	
}else{
echo 'Произошла ошибка';
$msBuildStatus;
}