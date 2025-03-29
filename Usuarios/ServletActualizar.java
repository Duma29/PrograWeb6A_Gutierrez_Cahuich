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

@WebServlet("/actualizar")
public class ServletActualizar extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        PrintWriter out = response.getWriter();

        int id = Integer.parseInt(request.getParameter("id"));
        String nombre = request.getParameter("nombre");
        String email = request.getParameter("email");

        Connection conexion = ServletConexion.conectar();
        String sql = "UPDATE usuarios SET nombre=?, email=? WHERE id=?";

        try {
            PreparedStatement ps = conexion.prepareStatement(sql);
            ps.setString(1, nombre);
            ps.setString(2, email);
            ps.setInt(3, id);
            ps.executeUpdate();

            out.println("<h2>Actualización exitosa</h2>");
        } catch (SQLException e) {
            e.printStackTrace();
            out.println("<h2>Error al actualizar datos</h2>");
        }
    }
}
