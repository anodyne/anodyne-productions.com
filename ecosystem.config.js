module.exports = {
    apps: [
        {
            name: 'anodyne',
            script: './start.js',
            env: {
                HOST: 'localhost',
                PORT: 3000
            }
        }
    ],
}