if [ -z "$FTP_HOST" ] || [ -z "$FTP_USER" ] || [ -z "$FTP_PASS" ]; then
    echo "FTP_HOST, FTP_USER and FTP_PASS env variables must be set."
    exit 1
fi

# Get last commit changed files.
files=$(git diff --name-only HEAD^ HEAD)

# Split files into delete and upload lists.
upload_files=""
delete_files=""
for file in $files; do
    if [ -f $file ]; then
        upload_files="$upload_files $file"
    else
        delete_files="$delete_files $file"
    fi
done

if [ -z "$upload_files" ]; then
    echo "No files to upload."
else
    for file in $upload_files; do
        curl -T $file -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/$file" --ftp-create-dirs --no-epsv
    done
fi


if [ -z "$delete_files" ];
then
    echo "No files to delete."
else
    for file in $delete_files; do
        curl -Q "-DELE $file" -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/$file" --no-epsv
    done
fi


# Publish FE build.
curl -T www/mix-manifest.json -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/www/mix-manifest.json" --no-epsv
for file in $(ls www/js); do
    curl -T "www/js/$file" -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/www/js/$file" --ftp-create-dirs --no-epsv
done
for file in $(ls www/css); do
    curl -T "www/css/$file" -u $FTP_USER:$FTP_PASS "ftp://$FTP_HOST/www/css/$file" --ftp-create-dirs --no-epsv
done
