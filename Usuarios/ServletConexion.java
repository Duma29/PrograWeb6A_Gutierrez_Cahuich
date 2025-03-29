import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class ServletConexion {
    private static final String URL = "jdbc:mysql://localhost:3306/tu_base_datos";
    private static final String USUARIO = "root";
    private static final String CONTRASEÑA = "";

    public static Connection conectar() {
        Connection conexion = null;
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            conexion = DriverManager.getConnection(URL, USUARIO, CONTRASEÑA);
            System.out.println("Conexión exitosa a la base de datos");
        } catch (ClassNotFoundException | SQLException e) {
            e.printStackTrace();
        }
        return conexion;
    }
}
