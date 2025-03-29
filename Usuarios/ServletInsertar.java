import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/insertar")
public class ServletInsertar extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();

        String nombre = request.getParameter("nombre");
        String email = request.getParameter("email");

        Connection conexion = ServletConexion.conectar();
        String sql = "INSERT INTO usuarios (nombre, email) VALUES (?, ?)";

        try {
            PreparedStatement ps = conexion.prepareStatement(sql);
            ps.setString(1, nombre);
            ps.setString(2, email);
            ps.executeUpdate();

            out.println("<h2>Registro exitoso</h2>");
        } catch (SQLException e) {
            e.printStackTrace();
            out.println("<h2>Error al registrar</h2>");
        }
    }
}
